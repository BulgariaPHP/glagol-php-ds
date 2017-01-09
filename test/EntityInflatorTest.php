<?php

namespace GlagolTest\Ds;

use Glagol\Ds\EntityExtractor;
use Glagol\Ds\EntityInflator;
use PHPUnit_Framework_TestCase;

class EntityInflatorTest extends PHPUnit_Framework_TestCase
{
    public function testShouldPopulateEntity()
    {
        $example = new Example();
        EntityInflator::inflate($example, [
            'id' => 2,
            'name' => 'haha',
        ]);

        $this->assertEquals(['id' => 2, 'name' => 'haha'], EntityExtractor::extract($example));
    }
}
