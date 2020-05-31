<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Templates\Package;

use Limoncello\Contracts\Provider\ProvidesCommandsInterface;
use Limoncello\Contracts\Provider\ProvidesContainerConfiguratorsInterface;
use Lolltec\Limoncello\Templates\Commands\JsFrameworkTemplatesCommand;

/**
 * @package Lolltec\Limoncello\Templates
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
