<?php

namespace Inspur\SDK\Mps\V1;

use Inspur\SDK\Core\Exceptions\SdkErrorMessage;
use Inspur\SDK\Core\Utils\HeaderSelector;
use Inspur\SDK\Core\Client;
use Inspur\SDK\Core\ClientBuilder;
use Inspur\SDK\Core\Utils\ModelInterface;



class MpsClient extends Client
{
    protected $headerSelector;
    protected $modelPackage;

    public function __construct($selector = null)
    {
        parent::__construct();
        $this->modelPackage = ModelInterface::class;
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    public static function newBuilder()
    {
        return new ClientBuilder(new MpsClient());
    }

    /**
     * 创建转码任务
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function createTranscodingTask($request)
    {
        return $this->createTranscodingTaskWithHttpInfo($request);
    }

    public function createTranscodingTaskWithHttpInfo($request)
    {
        $resourcePath = '/mps/openapi/v1/transcoding-tasks';
        $formParams = [];
        $queryParams = [];
        $pathParams = [];
        $httpBody = null;
        $headers = [];
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();

        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];

            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }

        if ($localVarParams['body'] !== null) {
            $httpBody = $localVarParams['body'];
        }
        return $this->callApi(
            $method = 'POST',
            $resourcePath,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\CreateTranscodingTaskResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\CreateTranscodingTaskRequest'
        );
    }

    /**
     * 获取转码任务
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function getTranscodingTask($request)
    {
        return $this->getTranscodingTaskWithHttpInfo($request);
    }

    public function getTranscodingTaskWithHttpInfo($request)
    {
        $resourcePath = '/mps/openapi/v1/transcoding-task-info';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $pathParams = [];
        $httpBody = null;
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();
        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];
            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }
        if ($localVarParams['id'] !== null) {
            $queryParams['id'] = $localVarParams['id'];
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }
        $headers = array_merge(
            $headerParams,
            $headers
        );

        $id = $request['id'];
        $queryParams = [
            'taskId' => $id,
            'timestamp' => $request->getTimestamp(),
            'nonce' => $request->getNonce(),
        ];

        return $this->callApi(
            $method = 'GET',
            $resourcePath,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\getTranscodingTaskResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\getTranscodingTaskRequest'
        );
    }

    /**
     * 删除转码任务
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function listTranscodingTask($request)
    {
        return $this->listTranscodingTaskWithHttpInfo($request);
    }

    public function listTranscodingTaskWithHttpInfo($request)
    {
        $resourcePath = '/mps/openapi/v1/transcoding-task-list';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $pathParams = [];
        $httpBody = null;
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();
        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];
            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }
        if ($localVarParams['id'] !== null) {
            $queryParams['id'] = $localVarParams['id'];
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }
        $headers = array_merge(
            $headerParams,
            $headers
        );

        $pageNo = $request['pageNo'];
        $pageSize = $request['pageSize'];


        $queryParams = [
            'pageNo' => $pageNo,
            'pageSize' => $pageSize,
            'timestamp' => $request->getTimestamp(),
            'nonce' => $request->getNonce(),
        ];
        if (isset($request['executeStatus']) && !empty($request['executeStatus'])) {
            $queryParams['executeStatus'] = $request['executeStatus'];
        }
        if (isset($request['startDate']) && !empty($request['startDate'])) {
            $queryParams['startDate'] = $request['startDate'];
        }
        if (isset($request['endDate']) && !empty($request['endDate'])) {
            $queryParams['endDate'] = $request['endDate'];
        }
        return $this->callApi(
            $method = 'GET',
            $resourcePath,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\ListTranscodingTaskResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\ListTranscodingTaskRequest'
        );
    }

    /**
     * 创建转码模板
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function createTranscodeTemplate($request)
    {
        return $this->createTranscodeTemplateWithHttpInfo($request);
    }

    public function createTranscodeTemplateWithHttpInfo($request)
    {
        $resourcePath = '/mps/openapi/v1/transcode-templates';
        $formParams = [];
        $queryParams = [];
        $pathParams = [];
        $httpBody = null;
        $headers = [];
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();

        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];

            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }

        if ($localVarParams['body'] !== null) {
            $httpBody = $localVarParams['body'];
        }

        return $this->callApi(
            $method = 'POST',
            $resourcePath,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\CreateTranscodeTemplateResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\CreateTranscodeTemplateRequest'
        );
    }

    /**
     * 获取转码模板
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function getTranscodeTemplate($request)
    {
        return $this->getTranscodeTemplateWithHttpInfo($request);
    }

    public function getTranscodeTemplateWithHttpInfo($request)
    {
        $resourcePath = '/mps/openapi/v1/transcode-templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $pathParams = [];
        $httpBody = null;
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();
        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];
            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }
        if ($localVarParams['id'] !== null) {
            $queryParams['id'] = $localVarParams['id'];
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }
        $headers = array_merge(
            $headerParams,
            $headers
        );

        $id = $queryParams['id'];
        $queryParams = [
            'timestamp' => $request->getTimestamp(),
            'nonce' => $request->getNonce(),
        ];

        return $this->callApi(
            $method = 'GET',
            $resourcePath . '/' . $id,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\getTranscodeTemplateResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\getTranscodeTemplateRequest'
        );
    }

    /**
     * 删除转码模板
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function deleteTranscodeTemplate($request)
    {
        return $this->deleteTranscodeTemplateWithHttpInfo($request);
    }

    public function deleteTranscodeTemplateWithHttpInfo($request)
    {
        $resourcePath = '/mps/openapi/v1/transcode-templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $pathParams = [];
        $httpBody = null;
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();
        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];
            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }
        if ($localVarParams['id'] !== null) {
            $queryParams['id'] = $localVarParams['id'];
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }
        $headers = array_merge(
            $headerParams,
            $headers
        );

        $id = $queryParams['id'];
        $queryParams = [
            'timestamp' => $request->getTimestamp(),
            'nonce' => $request->getNonce(),
        ];

        return $this->callApi(
            $method = 'DELETE',
            $resourcePath . '/' . $id,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\deleteTranscodeTemplateResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\deleteTranscodeTemplateRequest'
        );
    }

    /**
     * 创建水印模板
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function createWatermarkTemplate($request)
    {
        return $this->createWatermarkTemplateWithHttpInfo($request);
    }

    public function createWatermarkTemplateWithHttpInfo($request)
    {


        $resourcePath = '/regionsvc-cn-north-3/mps/watermark';
        $formParams = [];
        $queryParams = [];
        $pathParams = [];
        $httpBody = null;
        $headers = [];
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();

        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];

            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }

        if ($localVarParams['body'] !== null) {
            $httpBody = $localVarParams['body'];
        }
        $picInfo = $this->curlData(
            $httpBody->getPicUrl(),
            'https://service.cloud.inspur.com/regionsvc-cn-north-3/mps/file/upload'
        );
        $httpBody->setRegion('cn-north-3');
        $httpBody->setPicId($picInfo['id']);
        $httpBody->setPicUrl($picInfo['url']);
        $httpBody->setPosition(json_encode($httpBody->getPosition()));

        return $this->callApi(
            $method = 'POST',
            $resourcePath,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\CreateWatermarkTemplateResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\CreateWatermarkTemplateRequest'
        );
    }

    /**
     * 获取水印模板
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function getWatermarkTemplate($request)
    {
        return $this->getWatermarkTemplateWithHttpInfo($request);
    }

    public function getWatermarkTemplateWithHttpInfo($request)
    {
        $resourcePath = '/regionsvc-cn-north-3/mps/watermark/cn-north-3';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $pathParams = [];
        $httpBody = null;
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();
        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];
            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }
        if ($localVarParams['id'] !== null) {
            $queryParams['id'] = $localVarParams['id'];
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }
        $headers = array_merge(
            $headerParams,
            $headers
        );

        $id = $queryParams['id'];
        $queryParams = [
            'timestamp' => $request->getTimestamp(),
            'nonce' => $request->getNonce(),
        ];

        return $this->callApi(
            $method = 'GET',
            $resourcePath . '/' . $id,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\GetWatermarkTemplateResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\GetWatermarkTemplateRequest'
        );
    }

    /**
     * 删除水印模板
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function deleteWatermarkTemplate($request)
    {
        return $this->deleteWatermarkTemplateWithHttpInfo($request);
    }

    public function deleteWatermarkTemplateWithHttpInfo($request)
    {
        $resourcePath = '/mps/openapi/v1/watermark-templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $pathParams = [];
        $httpBody = null;
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();
        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];
            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }
        if ($localVarParams['id'] !== null) {
            $queryParams['id'] = $localVarParams['id'];
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }
        $headers = array_merge(
            $headerParams,
            $headers
        );

        $id = $queryParams['id'];
        $queryParams = [
            'timestamp' => $request->getTimestamp(),
            'nonce' => $request->getNonce(),
        ];

        return $this->callApi(
            $method = 'DELETE',
            $resourcePath . '/' . $id,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\deleteWatermarkTemplateResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\deleteWatermarkTemplateRequest'
        );
    }


    /**
     * 创建截图模板
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function createSnapshotTemplate($request)
    {
        return $this->createSnapshotTemplateWithHttpInfo($request);
    }

    public function createSnapshotTemplateWithHttpInfo($request)
    {
        $resourcePath = '/mps/openapi/v1/snapshot-templates';
        $formParams = [];
        $queryParams = [];
        $pathParams = [];
        $httpBody = null;
        $headers = [];
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();

        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];
            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }

        if ($localVarParams['body'] !== null) {
            $httpBody = $localVarParams['body'];
        }

        return $this->callApi(
            $method = 'POST',
            $resourcePath,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\CreateSnapshotTemplateResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\CreateSnapshotTemplateRequest'
        );
    }

    /**
     * 获取截图模板
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function getSnapshotTemplate($request)
    {
        return $this->getSnapshotTemplateWithHttpInfo($request);
    }

    public function getSnapshotTemplateWithHttpInfo($request)
    {
        $resourcePath = '/mps/openapi/v1/snapshot-templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $pathParams = [];
        $httpBody = null;
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();
        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];
            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }
        if ($localVarParams['id'] !== null) {
            $queryParams['id'] = $localVarParams['id'];
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }
        $headers = array_merge(
            $headerParams,
            $headers
        );

        $id = $queryParams['id'];
        $queryParams = [
            'timestamp' => $request->getTimestamp(),
            'nonce' => $request->getNonce(),
        ];

        return $this->callApi(
            $method = 'GET',
            $resourcePath . '/' . $id,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\getSnapshotTemplateResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\getSnapshotTemplateRequest'
        );
    }

    /**
     * 删除截图模板
     *
     * Please refer to Inspur cloud API Explorer for details.
     *
     * @param $request 请求对象
     * @return response
     */
    public function deleteSnapshotTemplate($request)
    {
        return $this->deleteSnapshotTemplateWithHttpInfo($request);
    }

    public function deleteSnapshotTemplateWithHttpInfo($request)
    {
        $resourcePath = '/mps/openapi/v1/snapshot-templates';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $pathParams = [];
        $httpBody = null;
        $multipart = false;
        $localVarParams = [];
        $arr = $request::attributeMap();
        foreach ($arr as $k => $v) {
            $getter = $request::getters()[$k];
            $value = $request->$getter();
            $localVarParams[$k] = $value;
        }
        if ($localVarParams['id'] !== null) {
            $queryParams['id'] = $localVarParams['id'];
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }
        $headers = array_merge(
            $headerParams,
            $headers
        );

        $id = $queryParams['id'];
        $queryParams = [
            'timestamp' => $request->getTimestamp(),
            'nonce' => $request->getNonce(),
        ];

        return $this->callApi(
            $method = 'DELETE',
            $resourcePath . '/' . $id,
            $pathParams,
            $queryParams,
            $headerParams = $headers,
            $body = $httpBody,
            $multipart = $multipart,
            $postParams = $formParams,
            $responseType = '\Inspur\SDK\Mps\V1\Model\deleteSnapshotTemplateResponse',
            $requestType = '\Inspur\SDK\Mps\V1\Model\deleteSnapshotTemplateRequest'
        );
    }


    protected function callApi(
        $method,
        $resourcePath,
        $pathParams = null,
        $queryParams = null,
        $headerParams = null,
        $body = null,
        $multipart = null,
        $postParams = null,
        $responseType = null,
        $requestType = null
    )
    {
        if ($method == 'POST') {
            $x_time = $body->getTimestamp() ?? time() . rand(100, 999);
            $x_nonce = $body->getNonce() ?? $this->uuid();
        } elseif ($method == 'GET' || $method == 'DELETE') {
            $x_time = $queryParams['timestamp'] ?? time() . rand(100, 999);
            $x_nonce = $queryParams['nonce'] ?? $this->uuid();
        }

        $headerParams = [
            'x-sign-algorithm' => 'md5',
            'Content-Type' => 'application/json;charset=UTF-8',
            'x-time' => $x_time,
            'x-random' => $x_nonce,
            'x-secret-id' => $this->getCredentials()->getAk(),
            'x-sign' => $this->signRequest(
                $method,
                $resourcePath,
                $queryParams,
                json_decode($body, true),
                $x_time,
                $x_nonce
            ),
        ];
        return $this->doHttpRequest(
            $method,
            $resourcePath,
            $pathParams,
            $queryParams,
            $headerParams,
            $body,
            $multipart,
            $postParams,
            $responseType,
            $requestType
        );
    }

    public function SortAll(&$params)
    {
        if (is_array($params)) {
            ksort($params);
        }
        foreach ($params as &$v) {
            if (is_array($v)) {
                $this->SortAll($v);
            }
        }
    }

    public function uuid()
    {
        $chars = md5(uniqid(mt_rand(), true));
        $uuid = substr($chars, 0, 8) . '-'
            . substr($chars, 8, 4) . '-'
            . substr($chars, 12, 4) . '-'
            . substr($chars, 16, 4) . '-'
            . substr($chars, 20, 12);
        return $uuid;
    }

    //计算签名
    public function signRequest($method, $uri, $queryParams, $data, $x_time, $x_random)
    {
        ;
        $str = $x_time . $x_random . $this->getCredentials()->getSk();

        $stringToSign = [];
        $stringToSign[] = $method;
        $stringToSign[] = "\n";
        $stringToSign[] = $str;
        $stringToSign[] = "\n";
        if (isset($queryParams) && !empty($queryParams)) {
            $this->SortAll($queryParams);

            $tmp_query_params = '';
            foreach ($queryParams as $key => $v) {
                if ($tmp_query_params == '') {
                    $tmp_query_params .= $key . '=' . $v;
                } else {
                    $tmp_query_params .= '&' . $key . '=' . $v;
                }
            }
            $uri = $uri . '?' . $tmp_query_params;
        }

        $stringToSign[] = $uri;

        if (isset($data) && !empty($data)) {
            $data['timestamp'] = $x_time;
            $data['nonce'] = $x_random;
            $stringToSign[] = "\n";
            $stringToSign[] = md5(json_encode($data, JSON_UNESCAPED_SLASHES));
        }


        $sign = implode('', $stringToSign);

        return base64_encode(md5($sign));
    }

    public function __toString()
    {
        $output = 'Debug output of ';
        $output .= 'model';
        $output = str_repeat('=', strlen($output)) . "\n" . $output . "\n" . str_repeat('=', strlen($output)) . "\n\n";
        $output .= "Model data\n-----------\n\n";
        $output .= "This data can be retrieved from the model object using the get() method of the model "
            . "(e.g. \$model->get(\$key)) or accessing the model like an associative array (e.g. \$model['key']).\n\n";
        $lines = array_slice(explode("\n", trim(print_r($this->toArray(), true))), 2, -1);
        $output .= implode("\n", $lines);
        return $output . "\n";
    }
    private function curlData($furl, $url)
    {
        $header[] = 'Authorization:bearer eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJUODdMZjF5azliU1JNWTAtLVRlWlJwekRQdnY5WTNPb2xpanZRaUZkcG9NIn0.eyJqdGkiOiJhOWYzNzFlNC0wZTVlLTQ4OWEtYmI1Ny0zOGRmMTA3YmMxOWYiLCJleHAiOjE2Nzc5MTE5NjMsIm5iZiI6MCwiaWF0IjoxNjc3OTA2NTYzLCJpc3MiOiJodHRwczovL2F1dGgxLmNsb3VkLmluc3B1ci5jb20vYXV0aC9yZWFsbXMvcGljcCIsImF1ZCI6WyJpbnNpZ2h0IiwiaW90LWh1YiIsImRiLXNlcnZpY2UiLCJjbGllbnQtZGFuZ2Npbmd6enciXSwic3ViIjoiMzdkMGVmYjAtMGU2ZS00OTM4LTliMTItMDZjNmNmYjRkMjY0IiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiY29uc29sZSIsIm5vbmNlIjoiNDU4ZTA1ODAtNDI3OC00YjA5LThkMTktZTUxY2NiZWYwYTBlIiwiYXV0aF90aW1lIjoxNjc3ODk3MzczLCJzZXNzaW9uX3N0YXRlIjoiMmNmOTc0ZDAtNzg2Yy00NmYwLWI2OTgtNTNlMDg0ODhlNzJhIiwiYWNyIjoiMCIsImFsbG93ZWQtb3JpZ2lucyI6WyIqIl0sInJlYWxtX2FjY2VzcyI6eyJyb2xlcyI6WyJBQ0NPVU5UX0FETUlOIiwib2ZmbGluZV9hY2Nlc3MiLCJ1bWFfYXV0aG9yaXphdGlvbiJdfSwicmVzb3VyY2VfYWNjZXNzIjp7Imluc2lnaHQiOnsicm9sZXMiOlsiYWRtaW4iXX0sImlvdC1odWIiOnsicm9sZXMiOlsiYWRtaW4iXX0sImRiLXNlcnZpY2UiOnsicm9sZXMiOlsiYWRtaW4iXX0sImNsaWVudC1kYW5nY2luZ3p6dyI6eyJyb2xlcyI6WyJhZG1pbiJdfX0sInNjb3BlIjoib3BlbmlkIiwicGhvbmUiOiIxNzg2MjkwMjUxNSIsImdyb3VwcyI6WyIvZ3JvdXAtZGFuZ2Npbmd6enciXSwicHJvamVjdCI6ImRhbmdjaW5nenp3IiwicHJlZmVycmVkX3VzZXJuYW1lIjoiZGFuZ2Npbmd6enciLCJlbWFpbCI6ImRhbmdjaW5nenp3QDE2My5jb20ifQ.g0VvdenBz_LcyQ16IscV3rcVGMRDvBhayxFhijQuQdDPe1Cwzro-d5h28_SOlhSILbXoJhaDovqPKTAYQX96_Zij6iF-q6yaoNVuVX4WQAYdt59R00QuyTrMGLTPD8x6riOW9upchRle3MHrKr6tE-5XClpYglDIeBHnbmy_euvJ5SLCp1d20__BkEJXo1DR96-o11abT1zfOx1fTxmGj-ajGA8HB7wu8iih8a-bxzrYaTvP1-lSVnqmxGe7qy7auvfHH-RkQ69M5sD6f9mMSzmG9dECqXy2rsEaaw3oWUuvH-lIa4iufBawGqYUkx4TVg4bRALb-7hbJR3pq08EUA'; // 上传的地址

        $ch = curl_init();
        curl_setopt($ch , CURLOPT_URL , $url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch , CURLOPT_POST, 1);
        // 注意这里的'file'是上传地址指定的key名
        curl_setopt($ch , CURLOPT_POSTFIELDS, array('file' => new \CURLFile(realpath($furl))));
        $output = curl_exec($ch);
        curl_close($ch);
        $response= json_decode($output,true);

        if(isset($response['result']) && !empty($response['result'])){
            return $response['result'];
        }else{
            return (new SdkErrorMessage())->setErrorMsg('文件上传失败');
        }
    }
}