<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Types;

/**
 * @package Lolltec\Limoncello\Flute
 */
class MultiPointType extends \Brick\Geo\Doctrine\Types\MultiPointType
{
    /**
     * Type name
     */
    const NAME = 'limoncelloMultiPoint';
}
