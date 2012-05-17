<?php
namespace OpenSslCrypt;


/**
 * Base key class, superclass for the Priv and the Pub classes. It is a simple container for openssl key resources.
 *
 */
class Key
{
    
    /**
     * OpenSSL key resource.
     *
     * @var resource
     */
    protected $_key = NULL;


    /**
     * Constructor.
     *
     * @param resource $key
     */
    public function __construct ($key)
    {
        $this->_key = $key;
    }


    /**
     * Reads a file into a string.
     *
     * @param string $filePath
     * @throws \Exception
     * @return string
     */
    static protected function _readFile ($filePath)
    {
        if (! is_readable($filePath)) {
            throw new \Exception(sprintf("File '%s' not found or unreadable", $filePath));
        }
        
        if (! is_file($filePath)) {
            throw new \Exception(sprintf("Invalid file '%s'", $filePath));
        }
        
        $data = file_get_contents($filePath);
        if (FALSE === $data) {
            throw new \Exception(sprintf("Error reading file '%s'", $filePath));
        }
        
        return $data;
    }


    /**
     * Returns the key as a resource.
     *
     * @return resource
     */
    public function asResource ()
    {
        return $this->_key;
    }
}