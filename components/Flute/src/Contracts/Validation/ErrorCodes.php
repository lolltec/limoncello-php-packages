<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\Contracts\Validation;

/**
 * @package Lolltec\Limoncello\Flute
 */
interface ErrorCodes extends \Limoncello\Validation\Contracts\Errors\ErrorCodes
{
    /** Message code */
    const INVALID_UUID = self::LAST + 1;
}
