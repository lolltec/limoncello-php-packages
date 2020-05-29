<?php declare(strict_types=1);

namespace NiftyCorner\Limoncello\Spreadsheet\Package;

use Limoncello\Contracts\Commands\ContainerConfiguratorInterface;
use Limoncello\Contracts\Container\ContainerInterface;

/**
 * @package NiftyCorner\Limoncello\Spreadsheet
 */
class SpreadsheetContainerConfigurator implements ContainerConfiguratorInterface
{
    /** @var callable */
    const CONFIGURATOR = [self::class, self::CONTAINER_METHOD_NAME];

    /**
     * @inheritDoc
     */
    public static function configureContainer(ContainerInterface $container): void
    {
    }
}
