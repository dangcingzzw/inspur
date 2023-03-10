<?php

require '../../../vendor/autoload.php';

use Inspur\SDK\Core\Auth\BasicCredentials;
use Inspur\SDK\Core\Http\HttpConfig;
use Inspur\SDK\Mps\V1\Model\CreateWatermarkTemplateReq;
use Inspur\SDK\Mps\V1\Model\CreateWatermarkTemplateRequest;
use Inspur\SDK\Mps\V1\Model\GetWatermarkTemplateRequest;
use Inspur\SDK\Mps\V1\Model\DeleteWatermarkTemplateRequest;
use Inspur\SDK\Mps\V1\MpsClient;
use \Inspur\SDK\Mps\V1\Enum\ResolutionEnum;

/**
 * name  水印模板名称。
 * watermarkType  水印类型，当前只支持Image（图片水印）。
 * picUrl  图片本地路径。
 * position  水印的位置。
 *      left 水印距离视频左上角左边位置，单位px；取值范围：8-4096，且只能为整数
 *      top  水印距离视频左上角的上方位置，单位px；取值范围：8-4096，且只能为整数
 *      width  水印宽度，单位px；取值范围：8-4096，且只能为整数和偶数
 *      height  水印高度，单位px；取值范围：8-4096，且只能为整数和偶数
 */

$ak = "MGNhNTBiOTctZjg4NC00NTk4LThjYmItNTk4ZmQzMDVhZjNm";
$sk = "M2M5OTNiMzMtMjk5ZS00MmFiLWE0NjYtYzQ0NTAzZWU3YzI3";
$endpoint = "https://service.cloud.inspur.com";
$projectId = "/cn-north-3";
$credentials = new BasicCredentials($ak, $sk, $projectId);
$config = HttpConfig::getDefaultConfig();

$client = MpsClient::newBuilder()
    ->withHttpConfig($config)
    ->withEndpoint($endpoint)
    ->withCredentials($credentials)
    ->build();

/**
 * 创建水印模板
 */
printf("---创建水印模板---");
$request = new CreateWatermarkTemplateRequest();
$body = new CreateWatermarkTemplateReq();
$body->setName("zzw123a");
$body->setPicUrl("C:\Users\dangcingzzw\Pictures\aaa.png");
$body->setPosition([
    'width' => 100,
    'height' => 100,
    'top' => 80,
    'left' => 80
]);


$body->setResolution(ResolutionEnum::SD);
$request->setBody($body);

$response = $client->CreateWatermarkTemplate($request);

if($response->getBody()){
    var_dump($response->getBody());
    $id=$response->getBody()['id'];
    var_dump($id);

    printf("---获取水印模板---");
    $requestGet = new GetWatermarkTemplateRequest();
    $requestGet->setId($id);
    $responseGet = $client->GetWatermarkTemplate($requestGet);
    var_dump($responseGet->getBody());


    printf("---删除水印模板---");
    $requestDelete = new DeleteWatermarkTemplateRequest();
    $requestDelete->setId($id);
    $responseDelete = $client->deleteWatermarkTemplate($requestDelete);
    var_dump($responseDelete->getBody());
}

die;
