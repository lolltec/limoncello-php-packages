<?php declare(strict_types=1);

namespace NiftyCorner\Limoncello\Flute\Types;

/**
 * @package NiftyCorner\Limoncello\Flute
 */
class MultiPointType extends \Brick\Geo\Doctrine\Types\MultiPointType
{
    /**
     * Type name
     */
    const NAME = 'limoncelloMultiPoint';
}
