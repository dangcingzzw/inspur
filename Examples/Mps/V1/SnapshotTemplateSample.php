<?php

require '../../vendor/autoload.php';

use Inspur\SDK\Core\Auth\BasicCredentials;
use Inspur\SDK\Core\Http\HttpConfig;
use Inspur\SDK\Mps\V1\Model\CreateSnapshotTemplateReq;
use Inspur\SDK\Mps\V1\Model\CreateSnapshotTemplateRequest;
use Inspur\SDK\Mps\V1\Model\GetSnapshotTemplateRequest;
use Inspur\SDK\Mps\V1\Model\DeleteSnapshotTemplateRequest;
use Inspur\SDK\Mps\V1\MpsClient;
use Inspur\SDK\Mps\V1\Enum\SnapshotTypeEnum;
use Inspur\SDK\Mps\V1\Enum\SnapshotFormatEnum;
use Inspur\SDK\Mps\V1\Enum\ResolutionEnum;
use Inspur\SDK\Mps\V1\Enum\SamplingTypeEnum;

/**
 * name  截图模板名称。
 * type  （timing：时间点截图 ； sampling：采样点截图，其中当type为sampling时,samplingType、samplingInterval参数必填。）
 * imageFormat  图片格式，目前只支持JPG格式
 * resolution   分辨率（分辨率标清：SD->标清：640480、HD->高清：1280720、FHD->全高清：19201080、2K->2K：20481440、4K->4K：3840*2160、customer->自定义。其中：当分辨率选用为 customer时，customerResolution参数必须选用。）
 * customerResolution  用户自定义分辨率信息
 * samplingType  采样方式：（秒/百分比）
 * samplingInterval  采样间隔（大于等于1且小于等于100，只能为整数）
 */

$ak = "MGNhNTBiOTctZjg4NC00NTk4LThjYmItNTk4ZmQzMDVhZjNm";
$sk = "M2M5OTNiMzMtMjk5ZS00MmFiLWE0NjYtYzQ0NTAzZWU3YzI3";
//$endpoint = "https://mps.cn-north-3.inspurcloudapi.com";
$endpoint = "https://service.cloud.inspur.com";
//$ak = "NzFkZTcyZWEtNjI4Yy00MWVkLTk2ODYtMzM5NzY3YjI3MTE4";
//$sk = "MDY4YjNmOTAtNDI4YS00ZmU0LWJlZWEtM2RkN2VlNmE4NDFj";
//$endpoint = "https://horizon.openstack.svc.cn-north-3.myinspurcloud.com";

$projectId = "/mps/openapi";
$credentials = new BasicCredentials($ak, $sk, $projectId);
$config = HttpConfig::getDefaultConfig();

$client = MpsClient::newBuilder()
    ->withHttpConfig($config)
    ->withEndpoint($endpoint)
    ->withCredentials($credentials)
    ->build();



printf("---创建截图模板---");
$request = new CreateSnapshotTemplateRequest();
$body = new CreateSnapshotTemplateReq();
$body->setName("采样截图-百分比666--标清-test12912");
$body->setType(SnapshotTypeEnum::TIMING);
$body->setImageFormat(SnapshotFormatEnum::JPG);
$body->setResolution(ResolutionEnum::CUSTOMER);
$body->setCustomerResolution([
    'longSide'=>200,
    'shortSide'=>200,
]);
//$body->setSamplingType(SamplingTypeEnum::PERCENT);
//$body->setSamplingInterval("22");

$request->setBody($body);
$response = $client->CreateSnapshotTemplate($request);
if($response->getBody()){

    var_dump($response->getBody());
    $id=$response->getBody()['id'];
    var_dump($id);
    printf("---获取截图模板---");
    $requestGet = new GetSnapshotTemplateRequest();
    $requestGet->setId($id);
    $responseGet = $client->GetSnapshotTemplate($requestGet);
    var_dump($responseGet->getBody());


    printf("---删除截图模板---");
    $requestDelete = new DeleteSnapshotTemplateRequest();
    $requestDelete->setId($id);

    $responseDelete = $client->deleteSnapshotTemplate($requestDelete);
    var_dump($responseDelete->getBody());
}

die;
