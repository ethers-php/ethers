<?php

namespace EthersPHP\Keccak256;



if (!function_exists('keccak256')) {
    /**
     * Sets the renderer implementation.
     */
    function keccak256($data): string
    {
        return Keccak256::hash($data);
    }
}
