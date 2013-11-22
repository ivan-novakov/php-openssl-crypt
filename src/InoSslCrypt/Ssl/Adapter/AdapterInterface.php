<?php

namespace InoSslCrypt\Ssl\Adapter;


interface AdapterInterface
{


    /**
     * Extracts the key from the private key.
     * 
     * @param mixed $privateKey
     * @return resource
     */
    public function getPrivateKey($privateKey, $passPhrase = '');


    /**
     * Extracts the key from the certificate.
     * 
     * @param mixed $certificate
     * @return resource
     */
    public function getPublicKey($certificate);
}