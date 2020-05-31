<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Types;

/**
 * @package Lolltec\Limoncello\Flute
 */
class MultiPolygonType extends \Brick\Geo\Doctrine\Types\MultiPolygonType
{
    /**
     * Type name
     */
    const NAME = 'limoncelloMultiPolygon';
}
