<?php

function env($key, $default = null)
{
    if (isset($_ENV[$key])) {
        return $_ENV[$key];
    } elseif (isset($_SERVER[$key])) {
        return $_SERVER[$key];
    }

    return $default;
}