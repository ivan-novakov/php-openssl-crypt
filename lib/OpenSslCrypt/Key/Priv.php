<?php
namespace OpenSslCrypt\Key;
use OpenSslCrypt\Key;
require_once 'OpenSslCrypt/Key.php';


/**
 * Private key representation.
 */
class Priv extends Key
{


    /**
     * Static "constructor" - creates a Key object from a private key string.
     *
     * @param string $keyString
     * @param string $passPhrase
     * @return \OpenSslCrypt\Key
     */
    static public function fromPrivateKeyString ($keyString, $passPhrase = '')
    {
        $key = openssl_pkey_get_private($keyString, $passPhrase);
        if ($key === FALSE) {
            throw new \Exception(sprintf("Error extracting private key: %s", openssl_error_string()));
        }
        
        return new self($key);
    }


    /**
     * Static "constructor" - creates a Key object from a private key file.
     *
     * @param string $keyPath
     * @param string $passPhrase
     * @return \OpenSslCrypt\Key
     */
    static public function fromPrivateKeyFile ($keyPath, $passPhrase = '')
    {
        return self::fromPrivateKeyString(self::_readFile($keyPath), $passPhrase);
    }
}