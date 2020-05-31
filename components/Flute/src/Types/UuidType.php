<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Types;

/**
 * @package Lolltec\Limoncello\Flute
 */
class UuidType extends \Ramsey\Uuid\Doctrine\UuidType
{
    /**
     * Type name
     */
    const NAME = 'limoncelloUuid';
}
