<?php

namespace Inspur\SDK\Mps\V2\Model;

use \ArrayAccess;
use Inspur\SDK\Core\Utils\ObjectSerializer;
use Inspur\SDK\Core\Utils\ModelInterface;
use Inspur\SDK\Core\SdkResponse;

class CreateWatermarkTemplateResponse implements ModelInterface, ArrayAccess
{
    use SdkResponse;
    const DISCRIMINATOR = null;

    /**
    * The original name of the model.
    *
    * @var string
    */
    protected static $openAPIModelName = 'CreateWatermarkTemplateResponse';

    /**
    * id  水印配置模板id<br/>
    *
    * @var string[]
    */
    protected static $openAPITypes = [
            'id' => 'string',
    ];

    /**
    * id  水印配置模板id<br/>
    *
    * @var string[]
    */
    protected static $openAPIFormats = [
        'id' => null,
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

    /**
    * id  水印配置模板id<br/>
    *
    * @var string[]
    */
    protected static $attributeMap = [
            'id' => 'id',
    ];

    /**
    * id  水印配置模板id<br/>
    *
    * @var string[]
    */
    protected static $setters = [
            'id' => 'setId',
    ];

    /**
    * id  水印配置模板id<br/>
    *
    * @var string[]
    */
    protected static $getters = [
            'id' => 'getId',
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['picUrl'] = isset($data['picUrl']) ? $data['picUrl'] : null;
        $this->container['watermarkPosition'] = isset($data['watermarkPosition']) ? $data['watermarkPosition'] : [];
        $this->container['createdTime'] = isset($data['createdTime']) ? $data['createdTime'] : '';
        $this->container['updateTime'] = isset($data['updateTime']) ? $data['updateTime'] : '';
    }

    /**
    * Show all the invalid properties with reasons.
    *
    * @return array invalid properties with reasons
    */
    public function listInvalidProperties()
    {
        $invalidProperties = [];
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
    * Gets id
    *  水印配置模板id<br/>
    *
    * @return string|null
    */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
    * Sets id
    *
    * @param string|null $id 水印配置模板id<br/>
    *
    * @return $this
    */
    public function setId($id)
    {
        $this->container['id'] = $id;
        return $this;
    }

    public function getName()
    {
        return $this->container['name'];
    }

    public function setName($name)
    {
        $this->container['name'] = $name;
        return $this;
    }
    public function getPicUrl()
    {
        return $this->container['picUrl'];
    }

    public function setPicUrl($picUrl)
    {
        $this->container['picUrl'] = $picUrl;
        return $this;
    }


    public function getWatermarkPosition()
    {
        return $this->container['WatermarkPosition'];
    }

    public function setWatermarkPosition($WatermarkPosition)
    {
        $this->container['WatermarkPosition'] = $WatermarkPosition;
        return $this;
    }
    public function getCreateTime()
    {
        return $this->container['createdTime'];
    }

    public function getUpdateTime()
    {
        return $this->container['updateTime'];
    }

    /**
    * Returns true if offset exists. False otherwise.
    *
    * @param integer $offset Offset
    *
    * @return boolean
    */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
    * Gets offset.
    *
    * @param integer $offset Offset
    *
    * @return mixed
    */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
    * Sets value based on offset.
    *
    * @param integer $offset Offset
    * @param mixed   $value  Value to be set
    *
    * @return void
    */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
                $this->container[] = $value;
            } else {
                $this->container[$offset] = $value;
        }
    }

    /**
    * Unsets offset.
    *
    * @param integer $offset Offset
    *
    * @return void
    */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
    * Gets the string presentation of the object
    *
    * @return string
    */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_UNESCAPED_SLASHES
        );
    }
}

