<?php
namespace OpenSslCrypt;
use OpenSslCrypt\Key\Pub;
use OpenSslCrypt\Key\Priv;


/**
 * The class implements the encrypt/decrypt methods.
 *
 */
class Processor
{
    
    /**
     * Processor options.
     *
     * @var array
     */
    protected $_options = NULL;


    /**
     * Constructor.
     *
     * @param array $options
     */
    public function __construct (Array $options = array())
    {
        $this->_options = $options;
    }


    /**
     * Encrypts data with the supplied public key object and returns an EncryptedData object containing
     * the encrypted data with the key.
     *
     * @param string $data
     * @param Pub $key
     * @return EncryptedData
     */
    public function encrypt ($data, Pub $key)
    {
        $encData = '';
        $encKeys = array();
        
        if (! openssl_seal($data, $encData, $encKeys, array(
            $key->asResource()
        ))) {
            throw new \Exception(sprintf("Error encrypting data with public key: %s", openssl_error_string()));
        }
        
        $encKey = $encKeys[0];
        
        require_once 'OpenSslCrypt/EncryptedData.php';
        return new EncryptedData($encKey, $encData);
    }


    /**
     * Decrypts data stored in an EncryptedData object (data + key).
     *
     * @param EncryptedData $encryptedData
     * @param Priv $key
     * @throws \Exception
     * @return string
     */
    public function decrypt (EncryptedData $encryptedData, Priv $key)
    {
        $decData = '';
        
        if (! openssl_open($encryptedData->getData(), $decData, $encryptedData->getKey(), $key->asResource())) {
            throw new \Exception(sprintf("Error decrypting data with private key: %s", openssl_error_string()));
        }
        
        return $decData;
    }


    /**
     * Returns the required option, if available.
     *
     * @param string $name
     * @return mixed|NULL
     */
    protected function _getOption ($name)
    {
        if (isset($this->_options[$name])) {
            return $this->_options[$name];
        }
        
        return NULL;
    }
}