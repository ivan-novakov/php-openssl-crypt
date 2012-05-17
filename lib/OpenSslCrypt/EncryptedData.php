<?php
namespace OpenSslCrypt;


/**
 * Container for the encrypted data and the encrypted encryption key :).
 * 
 * The getters/setters support base64 encoded values, because the encrypted data and key are in binary fotmat.
 */
class EncryptedData
{
    
    /**
     * Encrypted data.
     * 
     * @var string
     */
    protected $_data = NULL;
    
    /**
     * Encrypted key.
     * 
     * @var string
     */
    protected $_key = NULL;


    /**
     * Constructor.
     * 
     * @param string $key
     * @param string $data
     */
    public function __construct ($key, $data, $base64Encoded = false)
    {
        $this->setKey($key, $base64Encoded);
        $this->setData($data, $base64Encoded);
    }


    /**
     * Returns the encrypted key.
     * 
     * @param boolean $base64Encoded
     * @return string
     */
    public function getKey ($base64Encoded = false)
    {
        if ($base64Encoded) {
            return $this->_base64Encode($this->_key);
        }
        return $this->_key;
    }


    /**
     * Sets the encrypted key.
     * 
     * @param string $key
     * @param boolean $base64Encoded
     */
    public function setKey ($key, $base64Encoded)
    {
        if ($base64Encoded) {
            $key = $this->_base64Decode($key);
        }
        $this->_key = $key;
    }


    /**
     * Returns the encrypted data.
     * 
     * @param boolean $base64Encoded
     * @return string
     */
    public function getData ($base64Encoded = false)
    {
        if ($base64Encoded) {
            return $this->_base64Encode($this->_data);
        }
        return $this->_data;
    }


    /**
     * Sets the encrypted data.
     * 
     * @param string $data
     * @param boolean $base64Encoded
     */
    public function setData ($data, $base64Encoded = false)
    {
        if ($base64Encoded) {
            $data = $this->_base64Decode($data);
        }
        $this->_data = $data;
    }


    /**
     * Encodes data with MIME base64.
     * 
     * @param string $value
     * @throws \Exception
     * @return string
     */
    protected function _base64Encode ($value)
    {
        $encodedValue = base64_encode($value);
        if (FALSE === $encodedValue) {
            throw new \Exception('Error base64 encoding data');
        }
        
        return $encodedValue;
    }


    /**
     * Decodes data encoded with MIME base64.
     * 
     * @param string $value
     * @throws \Exception
     * @return string
     */
    protected function _base64Decode ($value)
    {
        $decodedValue = base64_decode($value, true);
        if (FALSE === $decodedValue) {
            throw new \Exception('Error base64 decoding data');
        }
        
        return $decodedValue;
    }
}