<?php

namespace Inspur\SDK\Mps\v2\Enum;


class ExecuteStatusEnum
{
    const COMPLETED = 'completed';//转码成功
    const FAILURE = 'failure';//转码失败
    const EXECUTING = 'executing';//执行中
    const SUBMITTED = 'submitted';//已提交
    const QUEUING = 'queuing';//排队中
    const CANCELED = 'canceled';//已取消
}
