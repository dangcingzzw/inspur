<?php

namespace Inspur\SDK\Mps\V1\Model;

use \ArrayAccess;
use Inspur\SDK\Core\Utils\ObjectSerializer;
use Inspur\SDK\Core\Utils\ModelInterface;
use Inspur\SDK\Core\SdkResponse;
use Inspur\SDK\Mps\V1\MpsClient;

class CreateTranscodingTaskResponse implements ModelInterface, ArrayAccess
{
    use SdkResponse;
    const DISCRIMINATOR = null;

    /**
    * The original name of the model.
    *
    * @var string
    */
    protected static $openAPIModelName = 'CreateTranscodingTaskResponse';

    /**
    *
    * @var string[]
    */
    protected static $openAPITypes = [
            'id' => 'string',
    ];

    /**
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
    *
    * @var string[]
    */
    protected static $attributeMap = [
            'id' => 'id',
    ];

    /**
    *
    * @var string[]
    */
    protected static $setters = [
            'id' => 'setId',
    ];

    /**
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
        $this->container['input'] = isset($data['input']) ? $data['input'] : null;
        $this->container['output'] = isset($data['output']) ? $data['output'] : null;
        $this->container['mediaProcessTaskInput'] = isset($data['mediaProcessTaskInput']) ? $data['mediaProcessTaskInput'] : null;
        $this->container['timestamp'] = isset($data['timestamp']) ? $data['timestamp'] : time().rand(100,999);
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

