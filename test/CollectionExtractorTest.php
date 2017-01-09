<?php

namespace GlagolTest\Ds;

use Ds\Vector;
use Glagol\Ds\CollectionExtractor;
use PHPUnit_Framework_TestCase;

class CollectionExtractorTest extends PHPUnit_Framework_TestCase
{
    public function testShouldExtractCollection()
    {
        $collection = new Vector([
            new Example(1, 22),
            new Example(2, 44),
        ]);

        $this->assertEquals(new Vector([
            ['id' => 1, 'name' => 22],
            ['id' => 2, 'name' => 44]
        ]), CollectionExtractor::extract($collection));
    }
}
