<?php

namespace EthersPHP\Bytes;

use EthersPHP\Bytes\Concerns\Hexable;

class Bytes
{
    public static function arrayify(int|string|array|Hexable $value, array $options = []): array
    {
        if (is_int($value)) {

            $result = [];
            while ($value) {

                array_unshift($result, $value & 0xff);

                $value = (int)((string) ($value / 256));
            }

            if (count($result) === 0) {

                $result[] = 0;
            }

            return $result;
        }

        if (is_string($value) && substr($value, 0, 2) !== '0x') {
            $value = '0x' . $value;
        }

        if ($value instanceof Hexable) {
            $value = $value->toHexString();
        }

        if (self::isHexString($value)) {
            $hex = substr($value, 2);

            if (strlen($hex) % 2) {
                if (isset($options["hexPad"]) && $options["hexPad"] === "left") {
                    $hex  = "0x0" . substr($hex, 2);
                } else if (isset($options["hexPad"]) && $options["hexPad"] === "right") {
                    $hex  .= "0";
                } else {
                    throw new \Exception("hex data is odd-length");
                }
            }

            $result = [];
            for ($i = 0; $i < strlen($hex); $i += 2) {
                $result[] = intval(substr($hex, $i, $i + 2), 16);
            }

            return $result;
        }

        if (self::isBytes($value)) {
            return $value;
        }

        throw new \Exception("invalid arrayify value");
    }

    public static function isBytes($value)
    {
        if (!is_array($value)) {
            return false;
        }

        for ($i = 0; $i < count($value); $i++) {
            $v = $value[$i];
            if (!is_integer($v) || $v < 0 || $v >= 256) {
                return false;
            }
        }

        return true;
    }

    public static function isHexString(mixed $value, $length = null)
    {
        if (!is_string($value)) {
            return false;
        }

        if (substr($value, 0, 2) !== '0x') {
            return false;
        }

        if (!preg_match('/^0x[0-9A-Fa-f]*$/', $value)) {
            return false;
        }

        if ($length && strlen($length) !== 2 + 2 * $length) {
            return false;
        }

        return true;
    }
}
