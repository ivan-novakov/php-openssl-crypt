<?php

namespace InoSslCryptTest;

use InoSslCrypt\KeyExtractor;


class KeyExtractorTest extends \PHPUnit_Framework_Testcase
{

    /**
     * @var KeyExtractor
     */
    protected $keyExtractor;


    public function setUp()
    {
        $this->keyExtractor = new KeyExtractor();
    }


    public function testExtractFromCertificate()
    {
        $certString = $this->getCertificate();
        $key = $this->keyExtractor->extractFromCertificate($certString);
        $this->assertInternalType('resource', $key);
    }
    
    /*
     * 
     */
    protected function getCertificate()
    {
        return file_get_contents(INOSSLCRYPT_TESTS_DATA_DIR . '/ssl/crypt.crt');
    }


    protected function getKey()
    {
        return file_get_contents(INOSSLCRYPT_TESTS_DATA_DIR . '/ssl/crypt.key');
    }
}