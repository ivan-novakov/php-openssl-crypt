<?php
namespace OpenSslCrypt\Key;
use OpenSslCrypt\Key;
require_once 'OpenSslCrypt/Key.php';


/**
 * Public key representation.
 */
class Pub extends Key
{


    /**
     * Static "constructor" - creates a Key object from a certificate string.
     *
     * @param string $certString
     * @throws \Exception
     * @return Pub
     */
    static public function fromCertificateString ($certString)
    {
        $key = openssl_pkey_get_public($certString);
        if ($key === FALSE) {
            throw new \Exception(sprintf("Error extracting public key from certificate: %s", openssl_error_string()));
        }
        
        return new self($key);
    }


    /**
     * Static constructor - creates a Key object from a certificate file.
     *
     * @param string $certPath
     * @throws \Exception
     * @return Pub
     */
    static public function fromCertificateFile ($certPath)
    {
        return self::fromCertificateString(self::_readFile($certPath));
    }
}  