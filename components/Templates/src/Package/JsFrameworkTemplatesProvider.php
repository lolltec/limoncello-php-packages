<?php declare(strict_types=1);

namespace NiftyCorner\Limoncello\Templates\Package;

use Limoncello\Contracts\Provider\ProvidesCommandsInterface;
use Limoncello\Contracts\Provider\ProvidesContainerConfiguratorsInterface;
use NiftyCorner\Limoncello\Templates\Commands\JsFrameworkTemplatesCommand;

/**
 * @package NiftyCorner\Limoncello\Templates
 */
class JsFrameworkTemplatesProvider implements ProvidesContainerConfiguratorsInterface, ProvidesCommandsInterface
{
    /**
     * @inheritdoc
     */
    public static function getContainerConfigurators(): array
    {
        return [
            JsFrameworkTemplatesContainerConfigurator::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getCommands(): array
    {
        return [
            JsFrameworkTemplatesCommand::class,
        ];
    }
}
