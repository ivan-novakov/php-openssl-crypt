Data encryption with OpenSSL in PHP
===================================

It is a simple object oriented library for data encryption using the OpenSSL PHP extension.

See details in the [blogpost](http://blog.debug.cz/2012/05/data-encryption-with-openssl-in-php.html).

Example usage:

    namespace OpenSslCrypt;
 
    $processor = new Processor();
 
    /*
     * Encryption with the public key.
     */
    $pubKey = Key\Pub::fromCertificateFile('ssl/crypt.crt');
    $encData = $processor->encrypt($data, $pubKey);
 
    /*
     * Decryption with the private key.
     */
    $privKey = Key\Priv::fromPrivateKeyFile('ssl/crypt.key');
    $decData = $processor->decrypt($encData, $privKey);