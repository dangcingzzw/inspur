<?php

require '../../vendor/autoload.php';

use Inspur\SDK\Core\Auth\BasicCredentials;
use Inspur\SDK\Core\Http\HttpConfig;
use Inspur\SDK\Mps\V1\Model\CreateTranscodingTaskReq;
use Inspur\SDK\Mps\V1\Model\CreateTranscodingTaskRequest;
use Inspur\SDK\Mps\V1\Model\GetTranscodingTaskRequest;
use Inspur\SDK\Mps\V1\Model\DeleteTranscodingTaskRequest;
use Inspur\SDK\Mps\V1\MpsClient;

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

$ak = "ZGM2MjNiMzAtYzkxOC00NTgwLWE1YTQtZGQ1ZjU4MTczNWU3";
$sk = "NDEzMDRiNTctNjIxNS00YTAwLWFlN2QtZTc4MTNkZThiYjFm";
$endpoint = "https://service-dev.inspurcloud.cn";
$projectId = "/mps/openapi";
$credentials = new BasicCredentials($ak, $sk, $projectId);
$config = HttpConfig::getDefaultConfig();

$client = MpsClient::newBuilder()
    ->withHttpConfig($config)
    ->withEndpoint($endpoint)
    ->withCredentials($credentials)
    ->build();
/**
 * 创建转码任务
 */
$request = new CreateTranscodingTaskRequest();
$body = new CreateTranscodingTaskReq();
$body->setInput([
    'bucket' => 'mps2',
    'object' => 'input/SampleVideo_1280x720_1mb.mp4',
]);
$body->setOutput([
    'bucket' => 'mps3',
    'object' => '电视剧/2022/',
]);
$body->setMediaProcessTaskInput([
    'transcodeTaskInput' => [
        'transcodeTemplateId' => '200928478868574208',
        'watermarkTemplateId' => '512993768854454272',
    ],
    'snapshotTaskInput' => [
        'snapshotTemplateId' => '511552299258019840',
        'snapshotConfig' => null,
        'snapshotMode' => 'afterTranscoding',
    ]
]);

$request->setBody($body);

$response = $client->CreateTransCodingTask($request);
var_dump($response->getBody());

/**
 * 获取转码任务
 */
$requestGet = new GetTranscodingTaskRequest();
$requestGet->setId($response->getId());
$responseGet = $client->GetTranscodingTask($requestGet);
var_dump($responseGet->getBody());

/**
 * 删除转码任务
 */
$requestDelete = new DeleteTranscodingTaskRequest();
$requestDelete->setId($response->getId());
$responseDelete = $client->deleteTranscodingTask($requestDelete);
var_dump($responseDelete->getBody());
