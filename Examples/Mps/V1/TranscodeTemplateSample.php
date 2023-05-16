<?php

require '../../../vendor/autoload.php';

use Inspur\SDK\Core\Auth\BasicCredentials;
use Inspur\SDK\Core\Http\HttpConfig;
use Inspur\SDK\Mps\V1\Model\CreateTranscodeTemplateReq;
use Inspur\SDK\Mps\V1\Model\CreateTranscodeTemplateRequest;
use Inspur\SDK\Mps\V1\Model\GetTranscodeTemplateRequest;
use Inspur\SDK\Mps\V1\Model\DeleteTranscodeTemplateRequest;
use Inspur\SDK\Mps\V1\Model\ListTranscodeTemplateRequest;
use Inspur\SDK\Mps\V1\MpsClient;
use Inspur\SDK\Mps\V1\Enum\ContainerTypeEnum;
use Inspur\SDK\Mps\V1\Enum\VcodecEnum;
use Inspur\SDK\Mps\V1\Enum\FreqAudioEnum;
use Inspur\SDK\Mps\V1\Enum\AcodecEnum;
use Inspur\SDK\Mps\V1\Enum\ChannelsAudioEnum;

/**
 * name  转码模板名称。
 * containerType  封装格式(可选MP4,HLS,FLV,MP3,M4A,AAC中的一种)
 * video  视频模板配置参数
 *        bitrateVideo 视频码率（10-50000，只能为整数， 单位kbps）
 *        vcodec 视频编码（H.264 High、H.264 Main、H.264 Baseline、 H.265 Main）
 *        resolution 分辨率（分辨率标清：SD->标清：640480、HD->高清：1280720、FHD->全高清：19201080、2K->2K：20481440、4K->4K：3840*2160、customer->自定义。其中：当分辨率选用为 customer时，customerResolution参数必须选用。)
 *        customerResolution  用户自定义分辨率信息
 *        freqVideo  视频帧率(1-60，只能为整数)
 * audio  音频模板配置参数
 *        longSide 分辨率宽度：取值范围：128-4096，且必须为整数和偶数；其中宽度和高度都为空，则分辨率和原视频保持一致。宽度为空，高度不为空，则按高度等比例缩放。宽度不为空，高度为空，则按宽度等比例缩放。均不为空，则根据宽度和高度缩放）
 *        shortSide 分辨率高度：取值范围：128-4096，且必须为整数和偶数；其中宽度和高度都为空，则分辨率和原视频保持一致。宽度为空，高度不为空，则按高度等比例缩放。宽度不为空，高度为空，则按宽度等比例缩放。均不为空，则根据宽度和高度缩放）
 *        samplerate 采样率（可选值：32000,34000,44100,48000,96000）
 *        bitrate 码率 视频码率（10-50000，只能为整数， 单位kbps）
 *        channels 声道数（可选值1,2,4,5,6,8)
 */

$ak = "Zjc5NGFiNWMtZTIxYS00MjExLWIxNTEtZTNlOGRkODZhMmJl";
$sk = "NWFjZDcwZGQtNTYwZC00YThmLTljOTYtNWVkOTA1MDNlMDQy";
$endpoint = "https://service.cloud.inspur.com";
$projectId = "regionsvc-cn-north-4/mps/openapi";
$credentials = new BasicCredentials($ak, $sk, $projectId);
$config = HttpConfig::getDefaultConfig();

$client = MpsClient::newBuilder()
    ->withHttpConfig($config)
    ->withEndpoint($endpoint)
    ->withCredentials($credentials)
    ->build();

printf("---创建转码模板---");
$request = new CreateTranscodeTemplateRequest();
$body = new CreateTranscodeTemplateReq();
$body->setName('transcodeTemplate11009');
$body->setContainerType(ContainerTypeEnum::HLS);
$body->setVideo([
    'bitrateVideo' => '100',
    'freqVideo' => '15',
    'vcodec' => VcodecEnum::H264_MAIN,
    'resolution' => 'customer',
    'customerResolution' => [
        'shortSide' => '400',
        'longSide' => '600'
    ]
]);
$body->setAudio([
    'bitrateAudio' => '128',
    'freqAudio' => FreqAudioEnum::FOUR_FOUR,
    'acodec' => AcodecEnum::MP3,
    'channelsAudio' => ChannelsAudioEnum::TWO,
]);

$request->setBody($body);

$response = $client->CreateTranscodeTemplate($request);

if ($response->getBody()) {
    var_dump($response->getBody());
    $id = $response->getBody()['id'];
    var_dump($id);


    printf("---获取转码模板详情---");
    $requestGet = new GetTranscodeTemplateRequest();
    $requestGet->setId($id);
    $responseGet = $client->GetTranscodeTemplate($requestGet);
    var_dump($responseGet->getBody());

    printf("---删除转码模板---");
    $requestDelete = new DeleteTranscodeTemplateRequest();
    $requestDelete->setId($id);

    $responseDelete = $client->deleteTranscodeTemplate($requestDelete);
    var_dump($responseDelete->getBody());

    printf("---获取转码模板列表---");
    $requestGet = new ListTranscodeTemplateRequest();
    $requestGet->setPageNo(1);//页码，从1开始；其中：默认为1
    $requestGet->setPageSize(5);//当页显示条数，从1开始；其中：默认为10；最大条数限制为100
    $requestGet->setId('703661185682178048');//转码模板ID模糊查询，举例说明：699192
    $requestGet->setName('测试名称');//转码模板名称模糊查询，举例说明：转码模板001
    $requestGet->setContainerType('MP4');//封装格式，举例说明：MP4
    $requestGet->setContainerGroup('video');//封装格式分组，参考值：video（视频类），audio（音频类）举例说明：video
    $requestGet->setType('system');//类型，参考值：system（内置模板），customer（自定义模板）
    $responseGet = $client->ListTranscodeTemplate($requestGet);
    var_dump($responseGet->getBody());

}
die;