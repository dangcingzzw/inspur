<?php
/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache LICENSE, Version 2.0 (the
 * "LICENSE"); you may not use this file except in compliance
 * with the LICENSE.  You may obtain a copy of the LICENSE at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the LICENSE is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the LICENSE for the
 * specific language governing permissions and limitations
 * under the LICENSE.
 */

namespace Inspur\SDK\Core\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Inspur\SDK\Core\Exceptions\CallTimeoutException;
use Inspur\SDK\Core\Exceptions\ClientRequestException;
use Inspur\SDK\Core\Exceptions\HostUnreachableException;
use Inspur\SDK\Core\Exceptions\RetryOutageException;
use Inspur\SDK\Core\Exceptions\SdkErrorMessage;
use Inspur\SDK\Core\Exceptions\SdkException;
use Inspur\SDK\Core\Exceptions\ServerResponseException;
use Inspur\SDK\Core\Exceptions\SslHandShakeException;
use Inspur\SDK\Core\SdkRequest;
use Monolog\Logger;

class HttpClient
{
    protected $httpConfig;
    protected $client;
    protected $logger;
    protected $httpHandler;

    public function __construct(
        HttpConfig $httpConfig = null,
        HttpHandler $httpHandler = null,
        Logger $logger = null
    ) {
        $this->httpConfig = isset($httpConfig) ? $httpConfig : new HttpConfig();
        $this->logger = isset($logger) ? $logger : null;
        $this->httpHandler = isset($httpHandler) ? $httpHandler : null;
        $this->client = new Client();
    }

    /**
     * @param Logger|null $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    private function createHttpClientOption(HttpConfig $config)
    {
        $httpOption = ['http_errors' => true];
        // proxy
        $proxyOption = ['proxy' => $config->getProxy()];

        // ssl
        if (!$config->ignoreSslVerification) {
            $sslOption = ['verify' => false,
            ];
        } else {
            $sslOption = ['verify' => false,
            ];
        }
        // time
        $timeOption = ['timeout' => $config->timeout,
            'connect_timeout' => $config->connectTimeout, ];

        return array_merge($httpOption, $proxyOption, $sslOption, $timeOption);
    }

    public function doRequestSync(SdkRequest $sdkRequest)
    {
        unset($sdkRequest->headerParams['User-Agent']);
        unset($sdkRequest->headerParams['X-Project-Id']);
        unset($sdkRequest->headerParams['X-Sdk-Content-md5']);
        unset($sdkRequest->headerParams['X-Sdk-Date']);
//        unset($sdkRequest->headerParams['Authorization']);
        //TODO 获取token方法
        $sdkRequest->headerParams['Authorization']='bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJUODdMZjF5azliU1JNWTAtLVRlWlJwekRQdnY5WTNPb2xpanZRaUZkcG9NIn0.eyJqdGkiOiJhOWYzNzFlNC0wZTVlLTQ4OWEtYmI1Ny0zOGRmMTA3YmMxOWYiLCJleHAiOjE2Nzc5MTE5NjMsIm5iZiI6MCwiaWF0IjoxNjc3OTA2NTYzLCJpc3MiOiJodHRwczovL2F1dGgxLmNsb3VkLmluc3B1ci5jb20vYXV0aC9yZWFsbXMvcGljcCIsImF1ZCI6WyJpbnNpZ2h0IiwiaW90LWh1YiIsImRiLXNlcnZpY2UiLCJjbGllbnQtZGFuZ2Npbmd6enciXSwic3ViIjoiMzdkMGVmYjAtMGU2ZS00OTM4LTliMTItMDZjNmNmYjRkMjY0IiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiY29uc29sZSIsIm5vbmNlIjoiNDU4ZTA1ODAtNDI3OC00YjA5LThkMTktZTUxY2NiZWYwYTBlIiwiYXV0aF90aW1lIjoxNjc3ODk3MzczLCJzZXNzaW9uX3N0YXRlIjoiMmNmOTc0ZDAtNzg2Yy00NmYwLWI2OTgtNTNlMDg0ODhlNzJhIiwiYWNyIjoiMCIsImFsbG93ZWQtb3JpZ2lucyI6WyIqIl0sInJlYWxtX2FjY2VzcyI6eyJyb2xlcyI6WyJBQ0NPVU5UX0FETUlOIiwib2ZmbGluZV9hY2Nlc3MiLCJ1bWFfYXV0aG9yaXphdGlvbiJdfSwicmVzb3VyY2VfYWNjZXNzIjp7Imluc2lnaHQiOnsicm9sZXMiOlsiYWRtaW4iXX0sImlvdC1odWIiOnsicm9sZXMiOlsiYWRtaW4iXX0sImRiLXNlcnZpY2UiOnsicm9sZXMiOlsiYWRtaW4iXX0sImNsaWVudC1kYW5nY2luZ3p6dyI6eyJyb2xlcyI6WyJhZG1pbiJdfX0sInNjb3BlIjoib3BlbmlkIiwicGhvbmUiOiIxNzg2MjkwMjUxNSIsImdyb3VwcyI6WyIvZ3JvdXAtZGFuZ2Npbmd6enciXSwicHJvamVjdCI6ImRhbmdjaW5nenp3IiwicHJlZmVycmVkX3VzZXJuYW1lIjoiZGFuZ2Npbmd6enciLCJlbWFpbCI6ImRhbmdjaW5nenp3QDE2My5jb20ifQ.g0VvdenBz_LcyQ16IscV3rcVGMRDvBhayxFhijQuQdDPe1Cwzro-d5h28_SOlhSILbXoJhaDovqPKTAYQX96_Zij6iF-q6yaoNVuVX4WQAYdt59R00QuyTrMGLTPD8x6riOW9upchRle3MHrKr6tE-5XClpYglDIeBHnbmy_euvJ5SLCp1d20__BkEJXo1DR96-o11abT1zfOx1fTxmGj-ajGA8HB7wu8iih8a-bxzrYaTvP1-lSVnqmxGe7qy7auvfHH-RkQ69M5sD6f9mMSzmG9dECqXy2rsEaaw3oWUuvH-lIa4iufBawGqYUkx4TVg4bRALb-7hbJR3pq08EUA'; // 上传的地址

        $request = new Request($sdkRequest->method,
            $sdkRequest->url,
            $sdkRequest->headerParams,
            $sdkRequest->body);


        if (isset($this->httpHandler)) {

            $this->httpHandler->processRequest(['request' => $sdkRequest, 'logger' => $this->logger]);
        }

        $httpOption = $this->createHttpClientOption($this->httpConfig);

        try {

        $response = $this->client->send($request, $httpOption);

            if (isset($this->httpHandler)) {
                $this->httpHandler->processResponse(['response' => $response, 'logger' => $this->logger]);
            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                if (isset($this->httpHandler)) {
                    $this->httpHandler->processResponse(['response' =>
                        $response, 'logger' => $this->logger]);
                }
                $responseStatusCode = $response->getStatusCode();
                $requestId = $response->getHeaders()['X-Request-Id'][0];
                $responseBody = $response->getBody();
                $sdkError = $this->getSdkErrorMessage($requestId,
                    $responseBody, $responseStatusCode);
                if (isset($response->getHeaders()['Content-Length'])) {
                    $contentLength = $response->getHeaders()['Content-Length'][0];
                } else {
                    $contentLength = 0;
                }
                if (isset($this->logger)) {
                    $this->logger->addInfo(' "'.$sdkRequest->method.' '.
                        $sdkRequest->url.'" '
                        .' '.$response->getStatusCode().' '.$contentLength
                        .' '.$response->getHeaders()['X-Request-Id'][0]);
                }

                if (400 <= $responseStatusCode and $responseStatusCode < 500) {
                    throw new ClientRequestException($responseStatusCode, $sdkError);
                } else {
                    throw new ServerResponseException($responseStatusCode, $sdkError);
                }
            } else {
                $this->getExceptionType($e->getMessage());
            }
        }
        if (isset($response->getHeaders()['Content-Length'])) {
            $contentLength = $response->getHeaders()['Content-Length'][0];
        } else {
            $contentLength = 0;
        }
        if (isset($this->logger)) {
            $this->logger->addInfo(' "'.$sdkRequest->method.' '.
                $sdkRequest->url.'" '
                .' '.$response->getStatusCode().' '.$contentLength
                .' '.$response->getHeaders()['request-id'][0]);
        }

        return $response;
    }


    public function doRequestAsync(SdkRequest $sdkRequest)
    {
        if (isset($this->httpHandler)) {
            $this->httpHandler->processRequest($sdkRequest);
        }
        $request = new Request($sdkRequest->method, $sdkRequest->url,
            $sdkRequest->headerParams, $sdkRequest->body);
        try {
            $httpOption = $this->createHttpClientOption($this->httpConfig);
            $promise = $this->client->sendAsync($request, $httpOption)->then(
                function ($response) use ($sdkRequest) {
                    if (isset($response->getHeaders()['Content-Length'])) {
                        $contentLength = $response->getHeaders()['Content-Length'][0];
                    } else {
                        $contentLength = 0;
                    }
                    if (isset($this->logger)) {
                        $this->logger->addInfo(' "'.$sdkRequest->method.' '.
                            $sdkRequest->url.'" '
                            .' '.$response->getStatusCode().' '.$contentLength
                            .' '.$response->getHeaders()['X-Request-Id'][0]);
                    }

                    return $response;
                },
                function (RequestException $e) use ($sdkRequest) {
                    if ($e->hasResponse()) {
                        $response = $e->getResponse();
                        $responseStatusCode = $response->getStatusCode();
                        $requestId = $response->getHeaders()['X-Request-Id'][0];
                        $responseBody = $response->getBody();
                        $sdkError = $this->getSdkErrorMessage($requestId,
                            $responseBody, $responseStatusCode);
                        if (isset($response->getHeaders()['Content-Length'])) {
                            $contentLength = $response->getHeaders()['Content-Length'][0];
                        } else {
                            $contentLength = 0;
                        }
                        if (isset($this->logger)) {
                            $this->logger->addInfo(' "'.$sdkRequest->method.' '.
                                $sdkRequest->url.'" '
                                .' '.$response->getStatusCode().' '.$contentLength
                                .' '.$response->getHeaders()['X-Request-Id'][0]);
                        }
                        if (400 <= $responseStatusCode and
                            $responseStatusCode < 500) {
                            throw new ClientRequestException($responseStatusCode, $sdkError);
                        } else {
                            throw new ServerResponseException($responseStatusCode, $sdkError);
                        }
                    } else {
                        $this->getExceptionType($e->getMessage());
                    }
                }
            );
        } catch (\Exception $e) {
            throw new SdkException($e->getMessage());
        }

        return $promise;
    }

    private function getSdkErrorMessage($requestId,
                                        $responseBody,
                                        $responseStatusCode
    ) {
        $sdkError = new SdkErrorMessage();
        try {
            $responseBodyArr = json_decode((string) $responseBody, true);
            if (isset($responseBodyArr['error_code']) and
                isset($responseBodyArr['error_msg'])) {
                $sdkError = new SdkErrorMessage($requestId,
                    $responseBodyArr['error_code'], $responseBodyArr['error_msg']);
            } elseif (isset($responseBodyArr['code']) and
                isset($responseBodyArr['message'])) {
                $sdkError = new SdkErrorMessage($requestId,
                    $responseBodyArr['code'], $responseBodyArr['message']);
            } else {
                foreach ($responseBodyArr as $key => $value) {
                    if (!is_array($responseBodyArr[$key])) {
                        return;
                    }
                    if (isset($responseBodyArr[$key]['code']) and
                        isset($responseBodyArr[$key]['message'])) {
                        $sdkError = new SdkErrorMessage($requestId,
                            $responseBodyArr[$key]['code'],
                            $responseBodyArr[$key]['message']);
                    } else {
                        $sdkError = new SdkErrorMessage($requestId,
                            $responseBodyArr[$key]['error_code'],
                            $responseBodyArr[$key]['error_msg']);
                    }
                }
            }
        } catch (\Exception $e) {
            throw new ServerResponseException($responseStatusCode, new
            SdkErrorMessage((string) $responseBody));
        }
        $sdkErrorMsg = $sdkError->getErrorMsg();
        if (!isset($sdkErrorMsg)) {
            $sdkError = new SdkErrorMessage((string) $responseBody);
        }

        return $sdkError;
    }

    private function getExceptionType($errorMessage)
    {
        $errorKey = explode(':', $errorMessage, 2)[0];
        $msg = explode(':', $errorMessage, 2)[1];
        echo "\n" . $errorMessage . "\n";
        switch ($errorKey) {
            case 'cURL error 6':
                if (isset($this->logger)) {
                    $this->logger->addError('HostUnreachableException occurred.'
                        .$msg);
                }
                throw new HostUnreachableException($msg);
                break;
            case 'cURL error 60':
                if (isset($this->logger)) {
                    $this->logger->addError('SslHandShakeException occurred.'
                        .$msg);
                }
                throw new SslHandShakeException($msg);
                break;
            case 'cURL error 28':
                if (isset($this->logger)) {
                    $this->logger->addError('CallTimeoutException occurred.'
                        .$msg);
                }
                throw new CallTimeoutException($msg);
                break;
            case 'cURL error 47':
                if (isset($this->logger)) {
                    $this->logger->addError('RetryOutageException occurred.'
                        .$msg);
                }
                throw new RetryOutageException($msg);
                break;
            default:
                if (isset($this->logger)) {
                    $this->logger->addError('SdkException occurred.'
                        .$msg);
                }
                throw new SdkException($errorMessage);
        }
    }
}
