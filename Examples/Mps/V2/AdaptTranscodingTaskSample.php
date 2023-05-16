<?php

require '../../../vendor/autoload.php';

use Inspur\SDK\Core\Auth\BasicCredentials;
use Inspur\SDK\Core\Http\HttpConfig;
use Inspur\SDK\Mps\V2\Model\CreateAdaptTranscodingTaskReq;
use Inspur\SDK\Mps\V2\Model\CreateAdaptTranscodingTaskRequest;
use Inspur\SDK\Mps\V2\Model\GetAdaptTransCodingTaskRequest;
use Inspur\SDK\Mps\V2\Model\ListAdaptTransCodingTaskRequest;

use Inspur\SDK\Mps\V2\MpsClient;
use Inspur\SDK\Mps\V2\Enum\ContainerTypeEnum;

/**
 * input   多需要转码处理的文件输入信息。
 *         bucket 需要多转码处理的视频文件所在的OSS桶名，
 *         object 需要转码处理的视频文件输入路径
 * output  多转码处理生成文件的输出信息。
 *         bucket 需要转码处理的视频文件所在的 OSS桶名
 *         folder 需要转码处理的视频文件输入路径
 * task  媒体处理任务类型参数
 *       containerType 容器类型（只支持m3u8)
 *       multiBitrateAudio  音频码率（多个音频码率参数用逗号隔开）
 *       multiBitrateVideo  视频码率（多个视频码率参数用逗号隔开）
 *       multiResolution  分辨率（多个分辨率参数率用逗号隔开）
 *       hlsTime  用于HLS自定义每小段音、视频流的播放时间长度，取值范围为：10-60
 *       waterMarkTemplateId 水印模板id
 */

//正式环境
//$ak = "MGNhNTBiOTctZjg4NC00NTk4LThjYmItNTk4ZmQzMDVhZjNm";
//$sk = "M2M5OTNiMzMtMjk5ZS00MmFiLWE0NjYtYzQ0NTAzZWU3YzI3";
//$endpoint = "https://service.cloud.inspur.com";
//$projectId = "/mps/openapi";
///**
// * 开发环境
// */
$ak = "NDdhOTY2YWMtYjA4NS00MWRlLWI3NDAtMjQwYTIzYWJmYmVm";
$sk = "MWY4OWY3ZTctNzZmMS00MmRjLWE5ZTUtMTllNzQ3MjIxZWZj";
$endpoint = "https://service-dev.inspurcloud.cn";
$projectId = "mps/openapi";
$credentials = new BasicCredentials($ak, $sk, $projectId);
$config = HttpConfig::getDefaultConfig();


$client = MpsClient::newBuilder()
    ->withHttpConfig($config)
    ->withEndpoint($endpoint)
    ->withCredentials($credentials)
    ->build();

printf("---创建多转码任务---");
$request = new CreateAdaptTranscodingTaskRequest();
$body = new CreateAdaptTranscodingTaskReq();
$body->setInput([
    'bucket' => 'zzwtestaa',
    'object' => '/bbb/1678174641782.mp4',
]);
$body->setOutput([
    'bucket' => 'output',
    'folder' => 'aaa/bbbccc'
]);
$body->setTask([
    'containerType' => ContainerTypeEnum::HLS,
    "multiResolution" => "1920:1080,1280:720,858:480",
    "multiBitrateVideo" => "1800,1200,858",
    "multiBitrateAudio" => "256,128,64",
    "hlstime" => 20,
    "watermarkTemplateId" => "688315854396260352"
]);
$request->setBody($body);
$response = $client->CreateAdaptTransCodingTask($request);
$id = $response->getBody()['taskId'];
var_dump($id);

printf("---获取多转码任务---");
$requestGet = new GetAdaptTransCodingTaskRequest();
$requestGet->setId($id);
$responseGet = $client->GetAdaptTransCodingTask($requestGet);
var_dump($responseGet->getBody());


printf("---获取多转码任务列表---");
$requestList = new ListAdaptTranscodingTaskRequest();
$requestList->setPageNo(1);
$requestList->setPageSize(5);
//$requestList->setStartDate('2022-01-10T01:42:47Z');
//$requestList->setEndDate('2023-03-17T01:59:24Z');
$requestList->setSubTaskIdList('701190294457090048,701190449872830464');

$responseDelete = $client->listAdaptTransCodingTask($requestList);
var_dump($responseDelete->getBody());
die;
