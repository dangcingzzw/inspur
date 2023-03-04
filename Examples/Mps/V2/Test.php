<?php

require '../../vendor/autoload.php';

use OSS\OSSClient;
use OSS\OSSException;

$ak = 'MzcyMjhjM2YtOGQwMi00YTE2LTk5MTQtZTZhY2U2NDE5ODFi';
$sk = 'MGEyYTY2NzQtNGM1MC00ODIzLWI1NjUtZWQ5NWQzOWZjYmJh';

$endpoint = 'http://oss.cn-north-3.inspurcloudoss.com';
//$endpoint = 'http://10.110.29.24';
$bucketName = 'zzwtest';


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
//    $res = $OSSClient->getAvInfoOperation([
//        'body' => [
//            'file' => 'https://mps-test.oss.dev.inspurcloudoss.com/input/2001-04-11.asf',
//        ]
//    ]);
//    $res=$OSSClient->putObject([
//        'Bucket'=>$bucketName,
//        'Key'=>'testzzw32.png',
//        'SourceFile'=>'C:\Users\dangcingzzw\Pictures\微信图片_20220801162748.png'
//    ]);
//    $resp=$OSSClient->createBucket([
//        'Bucket' => 'zzwtest',
//    ]);
//    $OSSClient->setBucketAcl ([
//        'Bucket' => $bucketName,
//        'ACL' => OSSClient::AclPrivate,
//    ]);

    $resp = $OSSClient->getBucketAcl ([
        'Bucket' => $bucketName
    ]);
    var_dump($resp);
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