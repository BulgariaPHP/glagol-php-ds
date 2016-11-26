<?php
declare(strict_types = 1);
namespace Glagol\Ds;

use Ds\Map;
use Ds\Pair;

class MapFactory
{
    public static function createFromPairs(Pair ...$params): Map
    {
        $map = new Map();

        $valueType = $keyType = null;

        foreach ($params as $i => $param) {
            if ($i === 0) {
                $keyType = gettype($param->key);
                $valueType = gettype($param->value);
            } else if (gettype($param->key) !== $keyType || gettype($param->value) !== $valueType) {
                throw new NotTheSameTypeException('Keys and values in map should be from the same type');
            }

            // TODO Somehow make it use the Pair object
            $map->put($param->key, $param->value);
        }

        return $map;
    }
}