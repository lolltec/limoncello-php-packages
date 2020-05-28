<?php declare(strict_types=1);

namespace NiftyCorner\Limoncello\Flute\Types;

/**
 * @package NiftyCorner\Limoncello\Flute
 */
class PolygonType extends \Brick\Geo\Doctrine\Types\PointType
{
    /**
     * Type name
     */
    const NAME = 'limoncelloPolygon';
}
