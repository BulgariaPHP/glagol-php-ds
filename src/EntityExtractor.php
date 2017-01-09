<?php
declare(strict_types = 1);
namespace Glagol\Ds;

class EntityExtractor
{
    private static function toSnakeCase($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

    public static function extract($entity): array
    {
        $properties = [];
        $reflection = new \ReflectionClass($entity);
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $properties[self::toSnakeCase($property->getName())] = $property->getValue($entity);
        }

        return $properties;
    }
}
