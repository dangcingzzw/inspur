<?php

namespace Inspur\SDK\Mps\V2\Model;

use Inspur\SDK\Core\Utils\ObjectSerializer;
use Inspur\SDK\Core\Utils\ModelInterface;
use Inspur\SDK\Mps\v2\MpsClient;

class CreateAdaptTranscodingTaskReq implements ModelInterface
{
    /**
     * input   多需要转码处理的文件输入信息。
     *         bucket 需要多转码处理的视频文件所在的OSS桶名，
     *         object 需要转码处理的视频文件输入路径
     * output  多转码处理生成文件的输出信息。
     *         bucket 需要转码处理的视频文件所在的 OSS桶名
     *         folder 需要转码处理的视频文件输入路径
     * task  媒体处理任务类型参数
     *       containerType 容器类型（只支持m3u8)
     *       multiBitrateAudio  音频码率（多个音频码率参数用逗号隔开）
     *       multiBitrateVideo  视频码率（多个视频码率参数用逗号隔开）
     *       multiResolution  分辨率（多个分辨率参数率用逗号隔开）
     *       hlsTime  用于HLS自定义每小段音、视频流的播放时间长度，取值范围为：10-60
     *       waterMarkTemplateId 水印模板id
     */
    protected static $openAPITypes = [
        'input' => 'string',
        'output' => 'string',
        'task' => 'array',
        'timestamp' => 'string',
        'nonce' => 'string',
    ];

    const DISCRIMINATOR = null;

    /**
    * The original name of the model.
    *
    * @var string
    */
    protected static $openAPIModelName = 'CreateAdaptTranscodingTaskReq';
    
    protected static $openAPIFormats = [
        'input' => '',
        'output' => '',
        'task' => [],
        'timestamp' => '',
        'nonce' => ''
    ];

    /**
    * Array of property to type mappings. Used for (de)serialization
    *
    * @return array
    */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
    * Array of property to format mappings. Used for (de)serialization
    *
    * @return array
    */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }


    protected static $attributeMap = [
        'input' => 'input',
        'output' => 'output',
        'task' => 'task',
        'timestamp' => 'timestamp',
        'nonce' => 'nonce'
    ];

    protected static $setters = [
        'input' => 'setInput',
        'output' => 'setOutput',
        'task' => 'setTask',
        'timestamp' => 'setTimestamp',
        'nonce' => 'setNonce'
    ];

    protected static $getters = [
        'input' => 'getInput',
        'output' => 'getOutput',
        'task' => 'getTask',
        'timestamp' => 'getTimestamp',
        'nonce' => 'getNonce'
    ];

    /**
    * Array of attributes where the key is the local name,
    * and the value is the original name
    *
    * @return array
    */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
    * Array of attributes to setter functions (for deserialization of responses)
    *
    * @return array
    */
    public static function setters()
    {
        return self::$setters;
    }

    /**
    * Array of attributes to getter functions (for serialization of requests)
    *
    * @return array
    */
    public static function getters()
    {
        return self::$getters;
    }

    /**
    * The original name of the model.
    *
    * @return string
    */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    
    /**
    * Associative array for storing property values
    *
    * @var mixed[]
    */
    protected $container = [];

    /**
    * Constructor
    *
    * @param mixed[] $data Associated array of property values
    *                      initializing the model
    */
    public function __construct(array $data = null)
    {
        $this->container['input'] = isset($data['input']) ? $data['input'] : null;
        $this->container['output'] = isset($data['output']) ? $data['output'] : null;
        $this->container['task'] = isset($data['task']) ? $data['task'] : null;
        $this->container['timestamp'] = isset($data['timestamp']) ? $data['timestamp'] : time().rand(100,999);;
        $this->container['nonce'] = isset($data['nonce']) ? $data['nonce'] : (new MpsClient())->uuid();
    }


    /**
    * Show all the invalid properties with reasons.
    *
    * @return array invalid properties with reasons
    */
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }

        return $invalidProperties;
    }

    /**
    * Validate all the properties in the model
    * return true if all passed
    *
    * @return bool True if all properties are valid
    */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }

    /**
    * Gets name
    *  截图模板名称。
    *
    * @return string
    */
    public function getInput()
    {
        return $this->container['input'];
    }
    public function setInput($input)
    {
        $this->container['input'] = $input;
        return $this;
    }

    public function getOutput()
    {
        return $this->container['output'];
    }
    public function setOutput($output)
    {
        $this->container['output']=$output;
        return $this;
    }

    public function getTask()
    {
        return $this->container['task'];
    }
    public function setTask($task)
    {
        $this->container['task']=$task;
        return $this;
    }

    public function getTimestamp(){
        return $this->container['timestamp'];
    }

    public function setTimestamp($timestamp){
        $this->container['timestamp']=$timestamp;
        return $this;
    }

    public function getNonce(){
        return $this->container['nonce'];
    }

    public function setNonce($nonce){
        $this->container['nonce']=$nonce;
        return $this;
    }



    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_UNESCAPED_SLASHES
        );
    }
}

