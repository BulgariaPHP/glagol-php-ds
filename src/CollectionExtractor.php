<?php
declare(strict_types = 1);
namespace Glagol\Ds;

use Ds\Vector;

class CollectionExtractor
{
    public static function extract($collection): Vector
    {
        $out = new Vector();
        foreach ($collection as $entity) {
            $out[] = EntityExtractor::extract($entity);
        }

        return $out;
    }
}
