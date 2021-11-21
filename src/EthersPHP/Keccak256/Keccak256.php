<?php

namespace EthersPHP\Keccak256;

use EthersPHP\Bytes\Bytes;
use kornrunner\Keccak;

class Keccak256
{
    public static function hash(mixed $data)
    {
        return '0x' . Keccak::hash(
            call_user_func_array("pack", array_merge(array("C*"), Bytes::arrayify($data))),
            256
        );
    }
}
