<?php

namespace Growats\OkNicLoginSecurity\Services;

class EncryptionService
{
    private static $encryptionKey = 'secret-key';

    public static function encryptData($data)
    {
        return openssl_encrypt($data, 'AES-256-CBC', self::$encryptionKey, 0, self::generateIv());
    }

    public static function decryptData($data)
    {
        return openssl_decrypt($data, 'AES-256-CBC', self::$encryptionKey, 0, self::generateIv());
    }

    private static function generateIv()
    {
        return substr(sha1(self::$encryptionKey), 0, 16);
    }
}
