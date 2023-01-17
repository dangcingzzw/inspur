<?php

require '../../vendor/autoload.php';

use OSS\OSSClient;
use OSS\OSSException;

$ak = 'inspur-ffe16c48-3672-4294-ad98-2be217c4b111-oss';

$sk = 'WinZZW1qqIkw72IDQYSLlxzROwL4SDlgGjTdF9Wz';

$endpoint = 'http://10.110.29.24/';

$bucketName = 'mps-test10';


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
    printf("测试用例");
    $res=$OSSClient->GetAvInfoOperation([
        'body' => [
            'file' => 'https://mps-test10.oss.dev.inspurcloudoss.com/testavi.avi',
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