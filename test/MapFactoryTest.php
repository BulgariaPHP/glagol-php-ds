<?php
declare(strict_types = 1);
namespace GlagolTest\Ds;

use Ds\Map;
use Ds\Pair;
use Glagol\Ds\MapFactory;
use Glagol\Ds\NotTheSameTypeException;

class MapFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testEmptyMapFactory()
    {
        $this->assertEquals((new Map())->toArray(), MapFactory::createFromPairs()->toArray());
    }

    public function testMapCreatedWithOnePair()
    {
        $expectedMap = new Map(['key' => 'value']);

        $map = MapFactory::createFromPairs(new Pair('key', 'value'));

        $this->assertEquals($expectedMap->toArray(), $map->toArray());
    }

    public function testMapCreatedWithSeveralPair()
    {
        $expectedMap = new Map(['key' => 'value', 'key2' => 'value2']);

        $map = MapFactory::createFromPairs(new Pair('key', 'value'), new Pair('key2', 'value2'));

        $this->assertEquals($expectedMap->toArray(), $map->toArray());
    }

    public function testMapCreationShouldThrowExceptionForDifferentTypesInTheSequence()
    {
        $this->expectException(NotTheSameTypeException::class);

        MapFactory::createFromPairs(new Pair('key', 'value'), new Pair(1, 'value2'));
    }
}
