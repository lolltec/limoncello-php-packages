<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Types;

/**
 * @package Lolltec\Limoncello\Flute
 */
class GeometryCollectionType extends \Brick\Geo\Doctrine\Types\GeometryCollectionType
{
    /**
     * Type name
     */
    const NAME = 'limoncelloGeometryCollection';
}
