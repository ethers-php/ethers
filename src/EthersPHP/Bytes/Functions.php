<?php

namespace EthersPHP\Bytes;

use EthersPHP\Bytes\Concerns\Hexable;

if (!function_exists('arrayify')) {
    /**
     * Sets the renderer implementation.
     */
    function arrayify(int|string|array|Hexable $data): array
    {
        return Bytes::arrayify($data);
    }
}


if (!function_exists('isHexString')) {
    /**
     * Sets the renderer implementation.
     */
    function isHexString(mixed $value, $length = null): bool
    {
        return Bytes::isHexString($value, $length);
    }
}
