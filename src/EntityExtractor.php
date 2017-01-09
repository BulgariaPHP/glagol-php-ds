<?php
declare(strict_types = 1);
namespace Glagol\Ds;

class EntityExtractor
{
    public static function extract($entity): array
    {
        $properties = [];
        $reflection = new \ReflectionClass($entity);
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $properties[$property->getName()] = $property->getValue($entity);
        }

        return $properties;
    }
}
