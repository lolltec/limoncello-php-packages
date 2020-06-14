<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Spreadsheet\Package;

use Limoncello\Contracts\Application\ContainerConfiguratorInterface;
use Limoncello\Contracts\Container\ContainerInterface;
use Lolltec\Limoncello\Spreadsheet\Contracts\SpreadsheetInterface;
use Lolltec\Limoncello\Spreadsheet\Spreadsheet;
use Psr\Container\ContainerInterface as PsrContainerInterface;

/**
 * @package Lolltec\Limoncello\Spreadsheet
 */
class SpreadsheetContainerConfigurator implements ContainerConfiguratorInterface
{
    /**
     * @inheritDoc
     */
    public static function configureContainer(ContainerInterface $container): void
    {
        $container[SpreadsheetInterface::class] = function (PsrContainerInterface $container): SpreadsheetInterface {
            return new Spreadsheet();
        };
    }
}
