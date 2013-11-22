<?php

namespace InoSslCrypt;


class KeyExtractor
{


    public function extractFromCertificate($certificate)
    {
        $key = openssl_get_publickey($certificate);
        if (false === $key) {
            throw new Exception\KeyExtractionException(sprintf("Error extracting key from certificate: %s", openssl_error_string()));
        }
        
        return $key;
    }


    public function extractFromPrivateKey($key, $passPhrase = '')
    {}
}