<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Spreadsheet\Package;

use Limoncello\Contracts\Provider\ProvidesContainerConfiguratorsInterface;

/**
 * @package Lolltec\Limoncello\Spreadsheet
 */
class SpreadsheetProvider implements ProvidesContainerConfiguratorsInterface
{
    /**
     * @inheritDoc
     */
    public static function getContainerConfigurators(): array
    {
        return [
            SpreadsheetContainerConfigurator::class,
        ];
    }
}
