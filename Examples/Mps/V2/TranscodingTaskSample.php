<?php

require '../../vendor/autoload.php';

use Inspur\SDK\Core\Auth\BasicCredentials;
use Inspur\SDK\Core\Http\HttpConfig;
use Inspur\SDK\Mps\V1\Model\CreateTranscodingTaskReq;
use Inspur\SDK\Mps\V1\Model\CreateTranscodingTaskRequest;
use Inspur\SDK\Mps\V1\Model\GetTranscodingTaskRequest;
use Inspur\SDK\Mps\V1\Model\ListTranscodingTaskRequest;
use Inspur\SDK\Mps\V1\MpsClient;
use Inspur\SDK\Mps\V1\Enum\ExecuteStatusEnum;

/**
 * input   需要转码处理的文件输入信息。
 *         bucket 需要转码处理的视频文件所在的 OSS 桶 名，需要先在控制台进行云资源授权.例如：mps-22xx
 *         object 需要转码处理的视频文件输入路径，如movie/2022/test.mp4
 * output  转码处理生成文件的输出信息。
 *         bucket 需要转码处理的视频文件所在的 OSS 桶 名，需要先在控制台进行云资源授权.例如：mps-22xx
 *         object 需要转码处理的视频文件输入路径，如movie/2022/test.mp4
 * mediaProcessTaskInput  媒体处理任务类型参数
 *       transcodeTaskInput  转码任务所需模板参数
 *             transcodeTemplateId  转码模板ID
 *             watermarkTemplateId  水印模板ID
 *       snapshotTaskInput  截图任务所需模板参数
 *             snapshotTemplateId 截图模板ID
 *             snapshotConfig 如果截图模板为时间点截图，该字段必填。 时间点截图字符串集合。最多为20个时间点。 举例说明：["00:00:03","00:01:00"]
 *             snapshotMode 截图模式： beforeTranscoding:转码之前截图;afterTranscoding:转码之后截图； 如果截图模板ID为空，该字段为空； 如果截图模板ID不为空的情况下，默认为转码之后截图；
 */

$ak = "MGNhNTBiOTctZjg4NC00NTk4LThjYmItNTk4ZmQzMDVhZjNm";
$sk = "M2M5OTNiMzMtMjk5ZS00MmFiLWE0NjYtYzQ0NTAzZWU3YzI3";
//$endpoint = "https://mps.cn-north-3.inspurcloudapi.com";
$endpoint = "https://service.cloud.inspur.com";
$projectId = "/mps/openapi";
$credentials = new BasicCredentials($ak, $sk, $projectId);
$config = HttpConfig::getDefaultConfig();

$client = MpsClient::newBuilder()
    ->withHttpConfig($config)
    ->withEndpoint($endpoint)
    ->withCredentials($credentials)
    ->build();
printf("---转码任务列表---");
$requestList = new ListTranscodingTaskRequest();
$requestList->setPageNo(1);
$requestList->setPageSize(2);
$requestList->setExecuteStatus(ExecuteStatusEnum::COMPLETED);
$requestList->setStartDate("2022-05-01T00:00:00Z");
$requestList->setEndDate("2022-12-01T00:00:00Z");

$responseDelete = $client->listTransCodingTask($requestList);
var_dump($responseDelete->getBody());die;

printf("---创建转码任务---");
$request = new CreateTranscodingTaskRequest();
$body = new CreateTranscodingTaskReq();
$body->setInput([
    'bucket' => 'mps-test12',
    'object' => 'input/SampleVideo_1280x720_1mb.mp4',
]);
$body->setOutput([
    'bucket' => 'output  ',
    'object' => '电视剧/2022/xxxtest.mp4'
]);
$body->setMediaProcessTaskInput([
    'transcodeTaskInput' => [
        'transcodeTemplateId' => '200928478868574208',
        'watermarkTemplateId' => '667408536209129472',
    ],
    'snapshotTaskInput' => [
        'snapshotTemplateId' => '667413904104554496',
        'snapshotConfig' => null,
        'snapshotMode' => 'afterTranscoding',
    ]
]);

$request->setBody($body);
$response = $client->CreateTransCodingTask($request);
$id=$response->getBody()['taskId'];


printf("---获取转码任务---");
$requestGet = new GetTransCodingTaskRequest();
$requestGet->setId($id);
$responseGet = $client->GetTransCodingTask($requestGet);
var_dump($responseGet->getBody());


printf("---转码任务列表---");
$requestList = new ListTranscodingTaskRequest();
$requestList->setPageNo(1);
$requestList->setPageSize(5);
//$requestList->setExecuteStatus(ExecuteStatusEnum::QUEUING);
$requestList->setStartDate('2022-02-10T01:42:47Z');
$requestList->setEndDate('2022-02-17T01:59:24Z');

$responseDelete = $client->listTransCodingTask($requestList);
var_dump($responseDelete->getBody());

