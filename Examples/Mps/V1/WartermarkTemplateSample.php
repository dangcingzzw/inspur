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
 * position  水印的位置。
 *      left 水印距离视频左上角左边位置，单位px；取值范围：8-4096，且只能为整数
 *      top  水印距离视频左上角的上方位置，单位px；取值范围：8-4096，且只能为整数
 *      width  水印宽度，单位px；取值范围：8-4096，且只能为整数和偶数
 *      height  水印高度，单位px；取值范围：8-4096，且只能为整数和偶数
 */


$ak = "Zjc5NGFiNWMtZTIxYS00MjExLWIxNTEtZTNlOGRkODZhMmJl";
$sk = "NWFjZDcwZGQtNTYwZC00YThmLTljOTYtNWVkOTA1MDNlMDQy";
$endpoint = "https://service.cloud.inspur.com";
$projectId = "regionsvc-cn-north-4/mps/openapi";
$credentials = new BasicCredentials($ak, $sk, $projectId);
/**
 * 如果希望用token的方式调用接口，需要在创建BasicCredentials对象时，增加$tokenUrl（获取签名token的地址）参数
 * 并设置setPicUrl值为本地图片路径
 */
//$tokenUrl="https://service.cloud.inspur.com/auth/v1/secrets/verify-signature";
//$credentials = new BasicCredentials($ak, $sk, $projectId,$tokenUrl);
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
$body->setName("20230308-1999");
//$body->setPicUrl("C:\Users\Administrator\Pictures\VCG41N108194814.jpg");
$body->setPicUrl("https://bssapi.cloud.inspur.com/group1/M00/03/6E/CmQAqGRi5JCACQLyAACLZ9OHaX8726.png");
$body->setPosition([
    'width' => '100',
    'height' => '100',
    'top' => '80',
    'left' => '80'
]);

$body->setRegion('cn-north-4');//regionsvc-cn-north-4
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
