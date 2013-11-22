<?php
require __DIR__ . '/../vendor/autoload.php';

define('INOSSLCRYPT_TESTS_DIR', __DIR__);
define('INOSSLCRYPT_TESTS_DATA_DIR', INOSSLCRYPT_TESTS_DIR . '/data');

// ----------
function _dump($value)
{
    error_log(print_r($value, true));
}