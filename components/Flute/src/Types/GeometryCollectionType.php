<?php declare(strict_types=1);

namespace NiftyCorner\Limoncello\Flute\Types;

/**
 * @package NiftyCorner\Limoncello\Flute
 */
class GeometryCollectionType extends \Brick\Geo\Doctrine\Types\GeometryCollectionType
{
    /**
     * Type name
     */
    const NAME = 'limoncelloGeometryCollection';
}
