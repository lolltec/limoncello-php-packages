<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Types;

/**
 * @package Lolltec\Limoncello\Flute
 */
class PolygonType extends \Brick\Geo\Doctrine\Types\PointType
{
    /**
     * Type name
     */
    const NAME = 'limoncelloPolygon';
}
