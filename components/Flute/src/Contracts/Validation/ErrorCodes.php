<?php declare(strict_types=1);

namespace NiftyCorner\Limoncello\Flute\Contracts\Validation;

/**
 * @package NiftyCorner\Limoncello\Flute
 */
interface ErrorCodes extends \Limoncello\Validation\Contracts\Errors\ErrorCodes
{
    /** Message code */
    const INVALID_UUID = self::LAST + 1;
}
