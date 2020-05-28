<?php declare(strict_types=1);

namespace NiftyCorner\Limoncello\Flute\Types;

/**
 * @package NiftyCorner\Limoncello\Flute
 */
class UuidType extends \Ramsey\Uuid\Doctrine\UuidType
{
    /**
     * Type name
     */
    const NAME = 'limoncelloUuid';
}
