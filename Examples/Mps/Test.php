<?php

require '../../vendor/autoload.php';

use OSS\OSSClient;
use OSS\OSSException;

$ak = 'ZjQxNjgzMDQtYmY0ZC00MjdlLTg0MTctNThlZGE2OGYxNjU3';

$sk = 'NzAyMWM1ZDAtYTZjNC00ZmNhLTlhYTAtMmNjMDNhMmNmNTFl';

$endpoint = 'http://oss.cn-north-3.inspurcloudoss.com';

$bucketName = 'chenli';


$OSSClient = OSSClient::factory([
    'key' => $ak,
    'secret' => $sk,
    'endpoint' => $endpoint,
    'socket_timeout' => 30,
    'connect_timeout' => 10
]);

try {
    /**
     * value:百分比
     */
    printf("图片处理-旋转-测试用例");
    $res=$OSSClient->GetAvInfoOperation([
        'body' => [
            'file' => 'https://sfff.oss.cn-north-3.inspurcloudoss.com/012.jpg',
        ]
    ]);
    var_dump($res);die;
}
catch ( OSSException $e ) {
        echo 'Response Code:' . $e->getStatusCode () . PHP_EOL;
        echo 'Error Message:' . $e->getExceptionMessage () . PHP_EOL;
        echo 'Error Code:' . $e->getExceptionCode () . PHP_EOL;
        echo 'Request ID:' . $e->getRequestId () . PHP_EOL;
        echo 'Exception Type:' . $e->getExceptionType () . PHP_EOL;
    } finally{
        $OSSClient->close ();
    }