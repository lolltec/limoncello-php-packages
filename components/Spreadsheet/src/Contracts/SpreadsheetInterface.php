<?php declare(strict_types=1);

namespace Lolltec\Limoncello\Spreadsheet\Contracts;

use PhpOffice\PhpSpreadsheet\Reader\IReader as SpreadsheetReader;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\IWriter as SpreadsheetWriter;

/**
 * @package Lolltec\Limoncello\Spreadsheet
 */
interface SpreadsheetInterface
{
    /**
     * @param string $file
     *
     * @return SpreadsheetReader
     */
    public function getReader(string $file): SpreadsheetReader;

    /**
     * @param Spreadsheet $spreadsheet
     * @param string      $extension
     *
     * @return SpreadsheetWriter
     */
    public function getWriter(Spreadsheet $spreadsheet, string $extension): SpreadsheetWriter;
}
