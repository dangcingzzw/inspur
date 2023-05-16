<?php

namespace Inspur\SDK\Mps\V1\Model;

use \ArrayAccess;
use Inspur\SDK\Core\Utils\ObjectSerializer;
use Inspur\SDK\Core\Utils\ModelInterface;
use Inspur\SDK\Core\SdkResponse;
use Inspur\SDK\Mps\V1\MpsClient;

class CreateWatermarkTemplateReq implements ModelInterface
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'CreateWatermarkTemplateReq';

    /**
     * name  水印模板名称。
     * watermarkType  水印类型，当前只支持Image（图片水印）。
     * position  水印的位置。
     */
    protected static $openAPITypes = [
        'name' => 'string',
        'picUrl' => 'string',
        'region' => 'string',
        'picId' => 'string',
        'position' => 'array',
        'watermarkPosition' => 'array',
        "resolution"=>'string',
        'timestamp' => 'string',
        'nonce' => 'string',
    ];


    protected static $openAPIFormats = [
        'name' => '',
        'picUrl' => '',
        'region' => '',
        'picId' => '',
        'position' => [],
        'watermarkPosition' => [],
        "resolution"=>'',
        'timestamp' => '',
        'nonce' => '',
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
        'picUrl' => 'picUrl',
        'region' => 'region',
        'picId' => 'picId',
        'position' => 'position',
        'watermarkPosition' => 'watermarkPosition',
        "resolution"=>'resolution',
        'timestamp' => 'timestamp',
        'nonce' => 'nonce',
    ];

    protected static $setters = [
        'name' => 'setName',
        'picId' => 'setPicId',
        'region' => 'setRegion',
        'picUrl' => 'setPicUrl',
        'position' => 'setPosition',
        'watermarkPosition' => 'setWatermarkPosition',
        'resolution' => 'setResolution',
        'timestamp' => 'setTimestamp',
        'nonce' => 'setNonce',
    ];

    protected static $getters = [
        'name' => 'getName',
        'picUrl' => 'getPicUrl',
        'region' => 'getRegion',
        'picId' => 'getPicId',
        'position' => 'getPosition',
        'watermarkPosition' => 'getWatermarkPosition',
        'resolution' => 'getResolution',
        'timestamp' => 'getTimestamp',
        'nonce' => 'getNonce',
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
        $this->container['region'] = isset($data['region']) ? $data['region'] : 'cn-north-4';
        $this->container['picUrl'] = isset($data['picUrl']) ? $data['picUrl'] : null;
        $this->container['picId'] = isset($data['picId']) ? $data['picId'] : null;
        $this->container['position'] = isset($data['position']) ? $data['position'] : null;
        $this->container['watermarkPosition'] = isset($data['watermarkPosition']) ? $data['watermarkPosition'] : null;
        $this->container['resolution'] = isset($data['resolution']) ? $data['resolution'] : null;
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
     *  水印模板名称。
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }
    public function getRegion()
    {
        return $this->container['region'];
    }
    public function getPicId()
    {
        return $this->container['picId'];
    }
    public function setPicId($picId)
    {
        $this->container['picId']=$picId;
        return $this;
    }
    public function setRegion($region)
    {
        $this->container['region']=$region;
        return $this;
    }
    public function getResolution()
    {
        return $this->container['resolution'];
    }
    public function setResolution($resolution)
    {
        $this->container['resolution']=$resolution;
        return $this;
    }
    public function getPicUrl()
    {
        return $this->container['picUrl'];
    }
    public function setPicUrl($picUrl)
    {
        $this->container['picUrl']=$picUrl;
        return $this;
    }
    public function getPosition()
    {
        return $this->container['position'];
    }
    public function setPosition($position)
    {
        $this->container['position']=$position;
        $this->container['watermarkPosition']=$position;
        return $this;
    }

    public function getWatermarkPosition()
    {
        return $this->container['watermarkPosition'];
    }
    public function setWatermarkPosition($watermarkPosition)
    {
        $this->container['watermarkPosition']=$watermarkPosition;
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

    public function setName($name)
    {
        $this->container['name'] = $name;
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

