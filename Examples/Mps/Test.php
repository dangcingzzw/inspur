<?php

require '../../vendor/autoload.php';

use OSS\OSSClient;
use OSS\OSSException;

$ak = 'NDdhOTY2YWMtYjA4NS00MWRlLWI3NDAtMjQwYTIzYWJmYmVm';
$sk = 'MWY4OWY3ZTctNzZmMS00MmRjLWE5ZTUtMTllNzQ3MjIxZWZj';

$endpoint = 'http://oss.dev.inspurcloudoss.com';
//$endpoint = 'http://10.110.29.24';
$bucketName = 'mps-test';


$OSSClient = OSSClient::factory([
    'key' => $ak,
    'secret' => $sk,
    'endpoint' => $endpoint,
    'socket_timeout' => 30,
    'connect_timeout' => 10
]);
try {
    /**
     * file:文件路径
     */
    printf("获取元数据示例");
    $res = $OSSClient->getAvInfoOperation([
        'body' => [
            'file' => 'https://mps-test.oss.dev.inspurcloudoss.com/input/2001-04-11.asf',
        ]
    ]);
    var_dump($res);
    die;
} catch (OSSException $e) {
    echo 'Response Code:' . $e->getStatusCode() . PHP_EOL;
    echo 'Error Message:' . $e->getExceptionMessage() . PHP_EOL;
    echo 'Error Code:' . $e->getExceptionCode() . PHP_EOL;
    echo 'Request ID:' . $e->getRequestId() . PHP_EOL;
    echo 'Exception Type:' . $e->getExceptionType() . PHP_EOL;
} finally {
    $OSSClient->close();
}