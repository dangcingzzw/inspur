# 安装

###### 更新时间： 2023-1-15

> 目录
>
> [环境准备](#环境准备)
>
> [下载sdk](#下载sdk)

## 环境准备

* 环境要求

    - php: >=5.6.0
    - [guzzlehttp/guzzle](https://packagist.org/packages/guzzlehttp/guzzle): ^6.3.0 || ^7.0
    - [guzzlehttp/psr7](https://packagist.org/packages/guzzlehttp/psr7): ^1.4.2 || ^2.0
    - [monolog/monolog](https://packagist.org/packages/monolog/monolog): ^1.23.0 || ^2.0

* 查看版本

  执行命令`php -version`查看PHP版本

## 下载sdk

* [sdk下载] composer require inspur/inspur-sdk-php

## 转码任务

参数说明:

##### input   需要转码处理的文件输入信息。
        bucket 需要转码处理的视频文件所在的 OSS 桶 名，需要先在控制台进行云资源授权.例如：mps-22xx
        object 需要转码处理的视频文件输入路径，如movie/2022/test.mp4
##### output 转码处理生成文件的输出信息。
        bucket 需要转码处理的视频文件所在的 OSS 桶 名，需要先在控制台进行云资源授权.例如：mps-22xx
        object 需要转码处理的视频文件输入路径，如movie/2022/test.mp4
##### mediaProcessTaskInput  媒体处理任务类型参数
       transcodeTaskInput  转码任务所需模板参数
                transcodeTemplateId  转码模板ID
                watermarkTemplateId  水印模板ID
        snapshotTaskInput  截图任务所需模板参数
                snapshotTemplateId 截图模板ID
                snapshotConfig 如果截图模板为时间点截图，该字段必填。 
                               时间点截图字符串集合。最多为20个时间点。 举例说明：["00:00:03","00:01:00"]
                snapshotMode 截图模式： beforeTranscoding:转码之前截图;
                              afterTranscoding:转码之后截图； 
                              如果截图模板ID为空，该字段为空； 如果截图模板ID不为空的情况下，默认为转码之后截图；

```php
// 声明命名空间
use Inspur\SDK\Core\Auth\BasicCredentials;
use Inspur\SDK\Core\Http\HttpConfig;
use Inspur\SDK\Mps\V1\Model\CreateTranscodingTaskReq;
use Inspur\SDK\Mps\V1\Model\CreateTranscodingTaskRequest;
use Inspur\SDK\Mps\V1\Model\GetTranscodingTaskRequest;
use Inspur\SDK\Mps\V1\Model\ListTranscodingTaskRequest;
use Inspur\SDK\Mps\V1\MpsClient;

// 创建MpsClient实例
$ak = "*** Provide your Access Key ***";
$sk = "*** Provide your Secret Key ***";
$endpoint = "https://your-endpoint";
$projectId = "/mps/openapi";
$credentials = new BasicCredentials($ak, $sk, $projectId);
$config = HttpConfig::getDefaultConfig();

$client = MpsClient::newBuilder()
    ->withHttpConfig($config)
    ->withEndpoint($endpoint)
    ->withCredentials($credentials)
    ->build();
//创建转码任务
$request = new CreateTranscodingTaskRequest();
$body = new CreateTranscodingTaskReq();
$body->setInput([
    'bucket' => 'bucketName1',
    'object' => 'input/objectName',
]);
$body->setOutput([
    'bucket' => 'bucketName2',
    'folder' => 'outputFilePath',
]);
$body->setMediaProcessTaskInput([
    'transcodeTaskInput' => [
        'transcodeTemplateId' => 'transcodeTemplateId',
        'watermarkTemplateId' => 'watermarkTemplateId',
    ],
    'snapshotTaskInput' => [
        'snapshotTemplateId' => 'snapshotTemplateId',
        'snapshotConfig' => null,
        'snapshotMode' => 'afterTranscoding',
    ]
]);

$request->setBody($body);
$response = $client->CreateTransCodingTask($request);
var_dump($response->getBody());

//获取转码任务
$requestGet = new GetTranscodingTaskRequest();
$requestGet->setId($response->getId());
$responseGet = $client->GetTranscodingTask($requestGet);
var_dump($responseGet->getBody());

//删除转码任务
$requestDelete = new ListTranscodingTaskRequest();
$requestDelete->setId($response->getId());
$responseDelete = $client->deleteTranscodingTask($requestDelete);
var_dump($responseDelete->getBody());
```

## 转码模板

参数说明:
##### name  转码模板名称
##### watermarkType  水印类型，当前只支持Image（图片水印）
##### position  水印的位置
     left 水印距离视频左上角左边位置，单位px；取值范围：8-4096，且只能为整数
     top  水印距离视频左上角的上方位置，单位px；取值范围：8-4096，且只能为整数
     width  水印宽度，单位px；取值范围：8-4096，且只能为整数和偶数
     height  水印高度，单位px；取值范围：8-4096，且只能为整数和偶数

```php
// 声明命名空间
use Inspur\SDK\Core\Auth\BasicCredentials;
use Inspur\SDK\Core\Http\HttpConfig;
use Inspur\SDK\Mps\V1\Model\CreateTranscodeTemplateReq;
use Inspur\SDK\Mps\V1\Model\CreateTranscodeTemplateRequest;
use Inspur\SDK\Mps\V1\Model\GetTranscodeTemplateRequest;
use Inspur\SDK\Mps\V1\Model\DeleteTranscodeTemplateRequest;
use Inspur\SDK\Mps\V1\MpsClient;

// 创建MpsClient实例
$ak = "*** Provide your Access Key ***";
$sk = "*** Provide your Secret Key ***";
$endpoint = "https://your-endpoint";
$projectId = "/mps/openapi";
$credentials = new BasicCredentials($ak, $sk, $projectId);
$config = HttpConfig::getDefaultConfig();

$client = MpsClient::newBuilder()
    ->withHttpConfig($config)
    ->withEndpoint($endpoint)
    ->withCredentials($credentials)
    ->build();

//创建转码模板
$request = new CreateTranscodeTemplateRequest();
$body = new CreateTranscodeTemplateReq();
$body->setName('HLS-H264-自定义分辨率-test');
$body->setContainerType('HLS');
$body->setVideo([
    'bitrateVideo' => '100',
    'freqVideo' => '15',
    'vcodec' => 'H.264 Main',
    'resolution' => 'customer',
    'customerResolution' => [
        'shortSide' => '400',
        'longSide' => '600'
    ]
]);
$body->setAudio([
    'bitrateAudio' => '128',
    'freqAudio' => '44100',
    'acodec' => 'MP3',
    'channelsAudio' => '2',
]);

$request->setBody($body);
$response = $client->CreateTranscodeTemplate($request);
var_dump($response->getBody());

//获取转码模板
$requestGet = new GetTranscodeTemplateRequest();
$requestGet->setId($response->getId());
$responseGet = $client->GetTranscodeTemplate($requestGet);
var_dump($responseGet->getBody());

//删除转码模板
$requestDelete = new DeleteTranscodeTemplateRequest();
$requestDelete->setId($response->getId());
$responseDelete = $client->deleteTranscodeTemplate($requestDelete);
var_dump($responseDelete->getBody());
die;
```

## 水印模板

参数说明:

##### name 水印模板名称
##### watermarkType 水印类型，当前只支持Image（图片水印）
##### position 水印的位置
    left 水印距离视频左上角左边位置，单位px；取值范围：8-4096，且只能为整数
    top  水印距离视频左上角的上方位置，单位px；取值范围：8-4096，且只能为整数
    width  水印宽度，单位px；取值范围：8-4096，且只能为整数和偶数
    height  水印高度，单位px；取值范围：8-4096，且只能为整数和偶数
```php
// 声明命名空间
use Inspur\SDK\Core\Auth\BasicCredentials;
use Inspur\SDK\Core\Http\HttpConfig;
use Inspur\SDK\Mps\V1\Model\CreateWatermarkTemplateReq;
use Inspur\SDK\Mps\V1\Model\CreateWatermarkTemplateRequest;
use Inspur\SDK\Mps\V1\Model\GetWatermarkTemplateRequest;
use Inspur\SDK\Mps\V1\Model\DeleteWatermarkTemplateRequest;
use Inspur\SDK\Mps\V1\MpsClient;

// 创建MpsClient实例
$ak = "*** Provide your Access Key ***";
$sk = "*** Provide your Secret Key ***";
$endpoint = "https://your-endpoint";
$projectId = "/mps/openapi";
$credentials = new BasicCredentials($ak, $sk, $projectId);
$config = HttpConfig::getDefaultConfig();

$client = MpsClient::newBuilder()
    ->withHttpConfig($config)
    ->withEndpoint($endpoint)
    ->withCredentials($credentials)
    ->build();

//创建水印模板
$request = new CreateWatermarkTemplateRequest();
$body = new CreateWatermarkTemplateReq();
$body->setName("resttt05");
$body->setPicUrl("http://10.110.29.239:9100/mps/20220704/4516effb-e404-4f79-a50a-3172634e9ee8.png");
$body->setWatermarkPosition([
    'width' => "100",
    'height' => "100",
    'top' => "80",
    'left' => "80"
]);
$request->setBody($body);

$response = $client->CreateWatermarkTemplate($request);
var_dump($response->getBody());

//获取水印模板
$requestGet = new GetWatermarkTemplateRequest();
$requestGet->setId($response->getId());
$responseGet = $client->GetWatermarkTemplate($requestGet);
var_dump($responseGet->getBody());

//删除水印模板
$requestDelete = new DeleteWatermarkTemplateRequest();
$requestDelete->setId($response->getId());
$responseDelete = $client->deleteWatermarkTemplate($requestDelete);
var_dump($responseDelete->getBody());
```



## 截图模板

参数说明:

##### name 截图模板名称
##### type 类型
    （timing：时间点截图 ； sampling：采样点截图，其中当type为sampling时,samplingType、samplingInterval参数必填。）
##### imageFormat 图片格式，目前只支持JPG格式
##### resolution 分辨率
    （分辨率标清：SD->标清：640480、HD->高清：1280720、FHD->全高清：19201080、2K->2K：20481440、
    4K->4K：3840*2160、customer->自定义。其中：当分辨率选用为
    customer时，customerResolution参数必须选用。）
##### customerResolution 用户自定义分辨率信息
##### samplingType 采样方式：（秒/百分比）
##### samplingInterval 采样间隔（大于等于1且小于等于100，只能为整数）

```php
// 声明命名空间
use Inspur\SDK\Core\Auth\BasicCredentials;
use Inspur\SDK\Core\Http\HttpConfig;
use Inspur\SDK\Mps\V1\Model\CreateSnapshotTemplateReq;
use Inspur\SDK\Mps\V1\Model\CreateSnapshotTemplateRequest;
use Inspur\SDK\Mps\V1\Model\GetSnapshotTemplateRequest;
use Inspur\SDK\Mps\V1\Model\DeleteSnapshotTemplateRequest;
use Inspur\SDK\Mps\V1\MpsClient;

// 创建MpsClient实例
$ak = "*** Provide your Access Key ***";
$sk = "*** Provide your Secret Key ***";
$endpoint = "https://your-endpoint";
$projectId = "/mps/openapi";
$credentials = new BasicCredentials($ak, $sk, $projectId);
$config = HttpConfig::getDefaultConfig();

$client = MpsClient::newBuilder()
    ->withHttpConfig($config)
    ->withEndpoint($endpoint)
    ->withCredentials($credentials)
    ->build();

//创建截图模板
$request = new CreateSnapshotTemplateRequest();
$body = new CreateSnapshotTemplateReq();
$body->setName("采样截图-百分比--标清-test");
$body->setType("sampling");
$body->setImageFormat("jpg");
$body->setResolution("SD");
$body->setCustomerResolution(null);
$body->setSamplingType("百分比");
$body->setSamplingInterval("22");

$request->setBody($body);
$response = $client->CreateSnapshotTemplate($request);
var_dump($response->getBody());

//获取截图模板
$requestGet = new GetSnapshotTemplateRequest();
$requestGet->setId($response->getId());
$responseGet = $client->GetSnapshotTemplate($requestGet);
var_dump($responseGet->getBody());

//删除截图模板
$requestDelete = new DeleteSnapshotTemplateRequest();
$requestDelete->setId($response->getId());
$responseDelete = $client->deleteSnapshotTemplate($requestDelete);
var_dump($responseDelete->getBody());
```
