<?php
declare(strict_types = 1);
namespace GlagolTest\Ds;

use Glagol\Ds\EntityExtractor;
use PHPUnit_Framework_TestCase;

class EntityExtractorTest extends PHPUnit_Framework_TestCase
{
    public function testShouldExtractValues()
    {
        $example = new Example(1, "hey");
        $this->assertEquals(['id' => 1, 'name' => 'hey'], EntityExtractor::extract($example));
    }
}
