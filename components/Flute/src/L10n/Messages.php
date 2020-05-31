<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Flute\L10n;

/**
 * @package Lolltec\Limoncello\Flute
 */
interface Messages extends \Limoncello\Flute\L10n\Messages
{
    /** @var string Validation Message Template */
    const INVALID_UUID = 'The value should be a valid UUID.';
}
