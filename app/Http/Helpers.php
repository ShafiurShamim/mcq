<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

if (!function_exists('get_reflection_class')) {
    /* Constants from class ReflectionMethod */
    // IS_STATIC = 1 ;
    // IS_PUBLIC = 256 ;
    // IS_PROTECTED = 512 ;
    // IS_PRIVATE = 1024 ;
    // IS_ABSTRACT = 2 ;
    // IS_FINAL = 4 ;
    function get_reflection_class($class, $const = 256)
    {
        return (new \ReflectionClass($class))->getMethods($const);
    }
}

if (!function_exists('get_reflection_method')) {
    function get_reflection_method($object, $method)
    {
        $reflectionMethod = new \ReflectionMethod($object, $method);
        $reflectionMethod->setAccessible(true);

        return $reflectionMethod;
    }
}
