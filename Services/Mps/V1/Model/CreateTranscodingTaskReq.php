<?php

namespace Inspur\SDK\Mps\V1\Model;

use \ArrayAccess;
use Inspur\SDK\Core\Utils\ObjectSerializer;
use Inspur\SDK\Core\Utils\ModelInterface;
use Inspur\SDK\Core\SdkResponse;
use Inspur\SDK\Mps\V1\MpsClient;

class CreateTranscodingTaskReq implements ModelInterface
{
    /**
     * input   需要转码处理的文件输入信息。
     *         bucket 需要转码处理的视频文件所在的 OSS 桶 名，需要先在控制台进行云资源授权.例如：mps-22xx
     *         object 需要转码处理的视频文件输入路径，如movie/2022/test.mp4
     * output  转码处理生成文件的输出信息。
     *         bucket 需要转码处理的视频文件所在的 OSS 桶 名，需要先在控制台进行云资源授权.例如：mps-22xx
     *         object 需要转码处理的视频文件输入路径，如movie/2022/test.mp4
     * mediaProcessTaskInput  媒体处理任务类型参数
     *       transcodeTaskInput  转码任务所需模板参数
     *             transcodeTemplateId  转码模板ID
     *             watermarkTemplateId  水印模板ID
     *       snapshotTaskInput  截图任务所需模板参数
     *             snapshotTemplateId 截图模板ID
     *             snapshotConfig 如果截图模板为时间点截图，该字段必填。 时间点截图字符串集合。最多为20个时间点。 举例说明：["00:00:03","00:01:00"]
     *             snapshotMode 截图模式： beforeTranscoding:转码之前截图;afterTranscoding:转码之后截图； 如果截图模板ID为空，该字段为空； 如果截图模板ID不为空的情况下，默认为转码之后截图；
     */
    protected static $openAPITypes = [
        'input' => 'string',
        'output' => 'string',
        'mediaProcessTaskInput' => 'array',
        'timestamp' => 'string',
        'nonce' => 'string',
    ];

    const DISCRIMINATOR = null;

    /**
    * The original name of the model.
    *
    * @var string
    */
    protected static $openAPIModelName = 'CreateTranscodingTaskReq';
    
    protected static $openAPIFormats = [
        'input' => '',
        'output' => '',
        'mediaProcessTaskInput' => [],
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
        'mediaProcessTaskInput' => 'mediaProcessTaskInput',
        'timestamp' => 'timestamp',
        'nonce' => 'nonce'
    ];

    protected static $setters = [
        'input' => 'setInput',
        'output' => 'setOutput',
        'mediaProcessTaskInput' => 'setMediaProcessTaskInput',
        'timestamp' => 'setTimestamp',
        'nonce' => 'setNonce'
    ];

    protected static $getters = [
        'input' => 'getInput',
        'output' => 'getOutput',
        'mediaProcessTaskInput' => 'getMediaProcessTaskInput',
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
        $this->container['mediaProcessTaskInput'] = isset($data['mediaProcessTaskInput']) ? $data['mediaProcessTaskInput'] : null;
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

    public function getMediaProcessTaskInput()
    {
        return $this->container['mediaProcessTaskInput'];
    }
    public function setMediaProcessTaskInput($mediaProcessTaskInput)
    {
        $this->container['mediaProcessTaskInput']=$mediaProcessTaskInput;
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

