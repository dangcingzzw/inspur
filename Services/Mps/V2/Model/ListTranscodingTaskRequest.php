<?php

namespace Inspur\SDK\Mps\V2\Model;

use \ArrayAccess;
use Inspur\SDK\Core\Utils\ObjectSerializer;
use Inspur\SDK\Core\Utils\ModelInterface;
use Inspur\SDK\Core\SdkResponse;
use Inspur\SDK\Mps\V2\MpsClient;

class ListTranscodingTaskRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'ListTranscodingTaskRequest';

    /**
     * Array of property to type mappings. Used for (de)serialization
     * id  转码任务配置id
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'pageNo' => 'int',
        'pageSize' => 'int',
        'executeStatus' => 'string',
        'startDate' => 'string',
        'endDate' => 'string',
        'timestamp' => 'string',
        'nonce' => 'string',

    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     * id  转码任务配置id
     *
     * @var string[]
     */
    protected static $openAPIFormats = [
        'pageNo' => 1,
        'pageSize' => 10,
        'executeStatus' => '',
        'startDate' => '',
        'endDate' => '',
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
        'pageNo' => 'pageNo',
        'pageSize' => 'pageSize',
        'executeStatus' => 'executeStatus',
        'startDate' => 'startDate',
        'endDate' => 'endDate',
        'timestamp' => 'timestamp',
        'nonce' => 'nonce'
    ];


    protected static $setters = [
        'pageNo' => 'setPageNo',
        'pageSize' => 'setPageSize',
        'executeStatus' => 'setExecuteStatus',
        'startDate' => 'setStartDate',
        'endDate' => 'setEndDate',
        'timestamp' => 'setTimestamp',
        'nonce' => 'setNonce'
    ];

    protected static $getters = [
        'pageNo' => 'getPageNo',
        'pageSize' => 'getPageSize',
        'executeStatus' => 'getExecuteStatus',
        'startDate' => 'getStartDate',
        'endDate' => 'getEndDate',
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
        $this->container['pageNo'] = isset($data['pageNo']) ? $data['pageNo'] : 1;
        $this->container['pageSize'] = isset($data['pageSize']) ? $data['pageSize'] : 10;
        $this->container['executeStatus'] = isset($data['executeStatus']) ? $data['executeStatus'] : null;
        $this->container['startDate'] = isset($data['startDate']) ? $data['startDate'] : null;
        $this->container['endDate'] = isset($data['endDate']) ? $data['endDate'] : null;
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


    public function getPageNo()
    {
        return $this->container['pageNo'];
    }

    public function setPageNo($pageNo)
    {
        $this->container['pageNo'] = $pageNo;
        return $this;
    }
    public function getPageSize()
    {
        return $this->container['pageSize'];
    }

    public function setPageSize($pageSize)
    {
        $this->container['pageSize'] = $pageSize;
        return $this;
    }
    public function getExecuteStatus()
    {
        return $this->container['executeStatus'];
    }

    public function setExecuteStatus($executeStatus)
    {
        $this->container['executeStatus'] = $executeStatus;
        return $this;
    }
    public function getStartDate()
    {
        return $this->container['startDate'];
    }

    public function setStartDate($startDate)
    {
        $this->container['startDate'] = $startDate;
        return $this;
    }
    public function getEndDate()
    {
        return $this->container['endDate'];
    }

    public function setEndDate($endDate)
    {
        $this->container['endDate'] = $endDate;
        return $this;
    }
    public function getTimestamp()
    {
        return $this->container['timestamp'];
    }
    public function setTimestamp($timestamp)
    {
        $this->container['timestamp']=$timestamp;
        return $this;
    }
    public function getNonce()
    {
        return $this->container['nonce'];
    }
    public function setNonce($nonce)
    {
        $this->container['nonce']=$nonce;
        return $this;
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
     * @param mixed $value Value to be set
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

