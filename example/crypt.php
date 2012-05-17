<?php
namespace OpenSslCrypt;
set_include_path('../lib/' . PATH_SEPARATOR . get_include_path());

require_once 'OpenSslCrypt/Processor.php';
require_once 'OpenSslCrypt/Key/Pub.php';
require_once 'OpenSslCrypt/Key/Priv.php';

$data = "Lorem ipsum dolor sit amet, consectetur adipisicing elit";
printf("Data to encrypt: %s\n", $data);

$processor = new Processor();

/*
 * Encryption with the public key.
 */
$pubKey = Key\Pub::fromCertificateFile('ssl/crypt.crt');
$encData = $processor->encrypt($data, $pubKey);

printf("Encrypted data: %s\nEncryption key (encrypted): %s\n", $encData->getData(true), $encData->getKey(true));

/*
 * Decryption with the private key.
 */
$privKey = Key\Priv::fromPrivateKeyFile('ssl/crypt.key');
$decData = $processor->decrypt($encData, $privKey);

printf("Decrypted data: %s\n", $decData);

