<?php

namespace Inspur\SDK\Mps\V1\Model;

use \ArrayAccess;
use Inspur\SDK\Core\Utils\ObjectSerializer;
use Inspur\SDK\Core\Utils\ModelInterface;
use Inspur\SDK\Core\SdkResponse;
use Inspur\SDK\Mps\V1\MpsClient;

class CreateWatermarkTemplateReq implements ModelInterface
{
    /**
     * name  水印模板名称。
     * watermarkType  水印类型，当前只支持Image（图片水印）。
     * position  水印的位置。
     * resolution  分辨率。
     */
    protected static $openAPITypes = [
        'name' => 'string',
        'picUrl' => 'string',
        'watermarkPosition' => 'array',
        'resolution' => 'string',
        'timestamp' => 'string',
        'nonce' => 'string',
    ];

    const DISCRIMINATOR = null;

    /**
    * The original name of the model.
    *
    * @var string
    */
    protected static $openAPIModelName = 'CreateWatermarkTemplateReq';


    protected static $openAPIFormats = [
        'name' => '',
        'picUrl' => '',
        'watermarkPosition' => [],
        'resolution' => '',
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
            'watermarkPosition' => 'watermarkPosition',
            'resolution' => 'resolution',
            'timestamp' => 'timestamp',
            'nonce' => 'nonce',
    ];

    protected static $setters = [
        'name' => 'setName',
        'picUrl' => 'setPicUrl',
        'watermarkPosition' => 'setWatermarkPosition',
        'resolution' => 'setResolution',
        'timestamp' => 'setTimestamp',
        'nonce' => 'setNonce',
    ];

    protected static $getters = [
        'name' => 'getName',
        'picUrl' => 'getPicUrl',
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
        $this->container['picUrl'] = isset($data['picUrl']) ? $data['picUrl'] : null;
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

    public function getPicUrl()
    {
        return $this->container['picUrl'];
    }
    public function getWatermarkPosition()
    {
        return $this->container['watermarkPosition'];
    }
    public function setPicUrl($picUrl)
    {
        $this->container['picUrl']=$picUrl;
        return $this;
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

    public function getResolution(){
        return $this->container['resolution'];
    }

    public function setResolution($resolution){
        $this->container['resolution']=$resolution;
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

