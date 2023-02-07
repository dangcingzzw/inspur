<?php

namespace Inspur\SDK\Mps\V1;

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
            'taskId'=>$id,
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
            'pageNo'=>$pageNo,
            'pageSize'=>$pageSize,
            'timestamp' => $request->getTimestamp(),
            'nonce' => $request->getNonce(),
        ];
        if(isset( $request['executeStatus']) && !empty($request['executeStatus'])){
            $queryParams['executeStatus']=$request['executeStatus'];
        }
        if(isset( $request['startDate']) && !empty($request['startDate'])){
            $queryParams['startDate']=$request['startDate'];
        }
        if(isset( $request['endDate']) && !empty($request['endDate'])){
            $queryParams['endDate']=$request['endDate'];
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
        $resourcePath = '/mps/openapi/v1/watermark-templates';
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
    ) {
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
    public function signRequest($method, $uri, $queryParams,$data, $x_time, $x_random)
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

            $tmp_query_params='';
            foreach($queryParams as $key=>$v){
                if($tmp_query_params==''){
                    $tmp_query_params.=$key.'='.$v;
                }else{
                    $tmp_query_params.='&'.$key.'='.$v;
                }
            }
            $uri=$uri.'?'.$tmp_query_params;
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
}