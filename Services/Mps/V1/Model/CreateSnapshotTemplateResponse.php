<?php

namespace Inspur\SDK\Mps\V1\Model;

use \ArrayAccess;
use Inspur\SDK\Core\Utils\ObjectSerializer;
use Inspur\SDK\Core\Utils\ModelInterface;
use Inspur\SDK\Core\SdkResponse;

class CreateSnapshotTemplateResponse implements ModelInterface, ArrayAccess
{
    use SdkResponse;
    const DISCRIMINATOR = null;

    /**
    * The original name of the model.
    *
    * @var string
    */
    protected static $openAPIModelName = 'CreateSnapshotTemplateResponse';

    /**
    * id  截图配置模板id<br/>
    *
    * @var string[]
    */
    protected static $openAPITypes = [
            'id' => 'string',
    ];

    /**
    * id  截图配置模板id<br/>
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
    * id  截图配置模板id<br/>
    *
    * @var string[]
    */
    protected static $attributeMap = [
            'id' => 'id',
    ];

    /**
    * id  截图配置模板id<br/>
    *
    * @var string[]
    */
    protected static $setters = [
            'id' => 'setId',
    ];

    /**
    * id  截图配置模板id<br/>
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['imageFormat'] = isset($data['imageFormat']) ? $data['imageFormat'] : null;
        $this->container['resolution'] = isset($data['resolution']) ? $data['resolution'] : null;
        $this->container['customerResolution'] = isset($data['customerResolution']) ? $data['customerResolution'] : null;
        $this->container['samplingType'] = isset($data['samplingType']) ? $data['samplingType'] : null;
        $this->container['samplingInterval'] = isset($data['samplingInterval']) ? $data['samplingInterval'] : null;
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
    *  截图配置模板id<br/>
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
    * @param string|null $id 截图配置模板id<br/>
    *
    * @return $this
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
    public function getType()
    {
        return $this->container['type'];
    }
    public function setType($type)
    {
        $this->container['type']=$type;
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
    public function getCustomerResolution()
    {
        return $this->container['customerResolution'];
    }
    public function setCustomerResolution($customerResolution)
    {
        $this->container['customerResolution']=$customerResolution;
        return $this;
    }
    public function getSamplingType()
    {
        return $this->container['samplingType'];
    }
    public function setSamplingType($samplingType)
    {
        $this->container['samplingType']=$samplingType;
        return $this;
    }
    public function getSamplingInterval()
    {
        return $this->container['samplingInterval'];
    }
    public function setSamplingInterval($samplingInterval)
    {
        $this->container['samplingInterval']=$samplingInterval;
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
            JSON_PRETTY_PRINT
        );
    }
}

