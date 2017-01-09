<?php
namespace Glagol\Ds;

class EntityInflator
{
    public static function inflate($entity, array $values)
    {
        $reflection = new \ReflectionClass($entity);
        foreach ($values as $key => $value) {
            $field = self::toCamelCase($key);
            $property = $reflection->getProperty($field);
            $property->setAccessible(true);
            $property->setValue($entity, $value);
        }
    }

    private static function toCamelCase($key)
    {
        return lcfirst(implode("", explode(" ", ucwords(str_replace('_', ' ', $key)))));
    }
}
