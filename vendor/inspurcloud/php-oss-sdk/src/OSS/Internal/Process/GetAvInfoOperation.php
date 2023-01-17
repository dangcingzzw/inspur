<?php

/**
 * Copyright 2022 InspurCloud Technologies Co.,Ltd.
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use
 * this file except in compliance with the License.  You may obtain a copy of the
 * License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software distributed
 * under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
 * CONDITIONS OF ANY KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations under the License.
 *
 */

namespace OSS\Internal\Process;
use OSS\OSSException;

class GetAvInfoOperation
{

    public function main($params)
    {
        $instr_name = '';
        $fileName = $params['body']['file'];
        $domain = $fileName . '?avinfo';
        var_dump($domain);
        $res = (new RequestResource())->request($domain, $instr_name) ?? [];
        var_dump($res);die;
        return $res;
    }
}