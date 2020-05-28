<?php declare(strict_types=1);

namespace NiftyCorner\Limoncello\Flute\Types;

/**
 * @package NiftyCorner\Limoncello\Flute
 */
class MultiPolygonType extends \Brick\Geo\Doctrine\Types\MultiPolygonType
{
    /**
     * Type name
     */
    const NAME = 'limoncelloMultiPolygon';
}
