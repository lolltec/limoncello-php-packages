<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Spreadsheet;

use Lolltec\Limoncello\Spreadsheet\Contracts\SpreadsheetInterface;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReader as SpreadsheetReader;
use PhpOffice\PhpSpreadsheet\Writer\IWriter as SpreadsheetWriter;

/**
 * @package Lolltec\Limoncello\Spreadsheet
 */
class Spreadsheet implements SpreadsheetInterface
{
    /**
     * @inheritDoc
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function getReader(string $file): SpreadsheetReader
    {
        return IOFactory::createReaderForFile($file);
    }

    /**
     * @inheritDoc
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function getWriter(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet, string $extension): SpreadsheetWriter
    {
        return IOFactory::createWriter($spreadsheet, $extension);
    }
}
