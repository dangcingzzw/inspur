<?php

namespace Inspur\SDK\Mps\V1\Model;

use \ArrayAccess;
use Inspur\SDK\Core\Utils\ObjectSerializer;
use Inspur\SDK\Core\Utils\ModelInterface;
use Inspur\SDK\Core\SdkResponse;
use Inspur\SDK\Mps\V1\MpsClient;

class CreateTranscodeTemplateReq implements ModelInterface
{
    /**
     * name  模板名称。
     * containerType  封装格式(可选MP4,HLS,FLV中的一种)
     * video  视频模板配置参数
     *        bitrateVideo 视频码率（10-50000，只能为整数， 单位kbps）
     *        vcodec 视频编码（H.264 High、H.264 Main、H.264 Baseline、 H.265 Main）
     *        resolution 分辨率（分辨率标清：SD->标清：640480、HD->高清：1280720、FHD->全高清：19201080、2K->2K：20481440、4K->4K：3840*2160、customer->自定义。其中：当分辨率选用为 customer时，customerResolution参数必须选用。)
     *        customerResolution  用户自定义分辨率信息
     *        freqVideo  视频帧率(1-60，只能为整数)
     * audio  音频模板配置参数
     *        longSide 分辨率宽度：取值范围：128-4096，且必须为整数和偶数；其中宽度和高度都为空，则分辨率和原视频保持一致。宽度为空，高度不为空，则按高度等比例缩放。宽度不为空，高度为空，则按宽度等比例缩放。均不为空，则根据宽度和高度缩放）
     *        shortSide 分辨率高度：取值范围：128-4096，且必须为整数和偶数；其中宽度和高度都为空，则分辨率和原视频保持一致。宽度为空，高度不为空，则按高度等比例缩放。宽度不为空，高度为空，则按宽度等比例缩放。均不为空，则根据宽度和高度缩放）
     */
    protected static $openAPITypes = [
        'name' => 'string',
        'containerType' => 'string',
        'video' => 'array',
        'audio' => 'array'
    ];

    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'CreateTranscodeTemplateReq';

    protected static $openAPIFormats = [
        'name' => '',
        'containerType' => '',
        'video' => [],
        'audio' => []
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
        'name' => 'name',
        'containerType' => 'containerType',
        'video' => 'video',
        'audio' => 'audio'
    ];

    protected static $setters = [
        'name' => 'setName',
        'containerType' => 'setContainerType',
        'video' => 'setVideo',
        'audio' => 'setAudio'
    ];

    protected static $getters = [
        'name' => 'getName',
        'containerType' => 'getContainerType',
        'video' => 'getVideo',
        'audio' => 'getAudio'
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['containerType'] = isset($data['containerType']) ? $data['containerType'] : null;
        $this->container['video'] = isset($data['video']) ? $data['video'] : null;
        $this->container['audio'] = isset($data['audio']) ? $data['audio'] : null;

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
     *  转码模板名称。
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }
    public function setName($name)
    {
        $this->container['name'] = $name;
        return $this;
    }

    public function getContainerType()
    {
        return $this->container['containerType'];
    }
    public function setContainerType($containerType)
    {
        $this->container['containerType']=$containerType;
        return $this;
    }
    public function getVideo()
    {
        return $this->container['video'];
    }
    public function setVideo($video)
    {
        $this->container['video']=$video;
        return $this;
    }
    public function getAudio()
    {
        return $this->container['audio'];
    }
    public function setAudio($audio)
    {
        $this->container['audio']=$audio;
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

