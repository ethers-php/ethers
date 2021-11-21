<?php

namespace EthersPHP\Bytes\Concerns;

interface Hexable
{
    /**
     * Returns the hexadecimal string representation of the bytes.
     *
     * @return string
     */
    public function toHexString(): string;
}
