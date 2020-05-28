<?php declare(strict_types=1);

namespace NiftyCorner\Limoncello\Flute\Package;

use Limoncello\Contracts\Provider\ProvidesContainerConfiguratorsInterface;

/**
 * @package NiftyCorner\Limoncello\Flute
 */
class FluteProvider implements ProvidesContainerConfiguratorsInterface
{
    /**
     * @inheritDoc
     */
    public static function getContainerConfigurators(): array
    {
        return [
            FluteContainerConfigurator::class,
        ];
    }
}
