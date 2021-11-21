<?php

namespace EthersPHP\Bytes;

use EthersPHP\Bytes\Concerns\Hexable;

if (!function_exists('arrayify')) {
    function arrayify(int|string|array|Hexable $data): array
    {
        return Bytes::arrayify($data);
    }
}


if (!function_exists('isHexString')) {
    function isHexString(mixed $value, $length = null): bool
    {
        return Bytes::isHexString($value, $length);
    }
}

if (!function_exists('isBytes')) {
    function isBytes(mixed $value): bool
    {
        return Bytes::isBytes($value);
    }
}
