<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 16.03.2017
 * Time: 15:42
 */
function encode_pass($string)
{
    if ($string) {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5('1HdcQDmV4hzvQHT35ZUdSnxbnJMyuqC4'),
            $string, MCRYPT_MODE_CBC, md5(md5('1HdcQDmV4hzvQHT35ZUdSnxbnJMyuqC4'))));
    } else
        return false;
}