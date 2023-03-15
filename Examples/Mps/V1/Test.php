<?php

require '../../../vendor/autoload.php';

use OSS\OSSClient;
use OSS\OSSException;

$ak = 'MzcyMjhjM2YtOGQwMi00YTE2LTk5MTQtZTZhY2U2NDE5ODFi';
$sk = 'MGEyYTY2NzQtNGM1MC00ODIzLWI1NjUtZWQ5NWQzOWZjYmJh';
$endpoint = 'http://oss.cn-north-3.inspurcloudoss.com';
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
            'file' => 'https://zzwtestaa.oss.cn-north-3.inspurcloudoss.com/
            CmQAsmIfJCWACTUPAAGLiwyPUsk567.png',
        ]
    ]);

    var_dump($res);die;
} catch (OSSException $e) {
    echo 'Response Code:' . $e->getStatusCode() . PHP_EOL;
    echo 'Error Message:' . $e->getExceptionMessage() . PHP_EOL;
    echo 'Error Code:' . $e->getExceptionCode() . PHP_EOL;
    echo 'Request ID:' . $e->getRequestId() . PHP_EOL;
    echo 'Exception Type:' . $e->getExceptionType() . PHP_EOL;
} finally {
    $OSSClient->close();
}