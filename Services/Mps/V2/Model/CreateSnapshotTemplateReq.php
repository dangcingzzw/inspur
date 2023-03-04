<?php

namespace Inspur\SDK\Mps\V2\Model;

use \ArrayAccess;
use Inspur\SDK\Core\Utils\ObjectSerializer;
use Inspur\SDK\Core\Utils\ModelInterface;
use Inspur\SDK\Core\SdkResponse;
use Inspur\SDK\Mps\V2\MpsClient;

class CreateSnapshotTemplateReq implements ModelInterface
{
    /**
     * name  模板名称。
     * type  （timing：时间点截图 ； sampling：采样点截图，其中当type为sampling时,samplingType、samplingInterval参数必填。）
     * imageFormat  图片格式，目前只支持JPG格式
     * resolution   分辨率（分辨率标清：SD->标清：640480、HD->高清：1280720、FHD->全高清：19201080、2K->2K：20481440、4K->4K：3840*2160、customer->自定义。其中：当分辨率选用为 customer时，customerResolution参数必须选用。）
     * customerResolution  用户自定义分辨率信息
     * samplingType  采样方式：（秒/百分比）
     * samplingInterval  采样间隔（大于等于1且小于等于100，只能为整数）
     */
    protected static $openAPITypes = [
        'name' => 'string',
        'type' => 'string',
        'imageFormat' => 'string',
        'resolution' => 'string',
        'customerResolution' => 'string',
        'samplingType' => 'string',
        'samplingInterval' => 'string',
        'timestamp' => 'string',
        'nonce' => 'string',
    ];

    const DISCRIMINATOR = null;

    /**
    * The original name of the model.
    *
    * @var string
    */
    protected static $openAPIModelName = 'CreateSnapshotTemplateReq';
    
    protected static $openAPIFormats = [
        'name' => '',
        'type' =>  '',
        'imageFormat' =>  '',
        'resolution' =>  '',
        'customerResolution' =>  '',
        'samplingType' =>  '',
        'samplingInterval' =>  '',
        'timestamp' =>  '',
        'nonce' =>  '',
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
        'type' =>  'type',
        'imageFormat' =>  'imageFormat',
        'resolution' =>  'resolution',
        'customerResolution' =>  'customerResolution',
        'samplingType' =>  'samplingType',
        'samplingInterval' =>  'samplingInterval',
        'timestamp' =>  'timestamp',
        'nonce' =>  'nonce',
    ];

    protected static $setters = [
        'name' => 'setName',
        'type' =>  'setType',
        'imageFormat' =>  'setImageFormat',
        'resolution' =>  'setResolution',
        'customerResolution' =>  'setCustomerResolution',
        'samplingType' =>  'setSamplingType',
        'samplingInterval' =>  'setSamplingInterval',
        'timestamp' =>  'setTimestamp',
        'nonce' =>  'setNonce',
    ];

    protected static $getters = [
        'name' => 'getName',
        'type' =>  'getType',
        'imageFormat' =>  'getImageFormat',
        'resolution' =>  'getResolution',
        'customerResolution' =>  'getCustomerResolution',
        'samplingType' =>  'getSamplingType',
        'samplingInterval' =>  'getSamplingInterval',
        'timestamp' =>  'getTimestamp',
        'nonce' =>  'getNonce',
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
    public function getImageFormat()
    {
        return $this->container['imageFormat'];
    }
    public function setImageFormat($imageFormat)
    {
        $this->container['imageFormat']=$imageFormat;
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



    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_UNESCAPED_SLASHES
        );
    }
}

