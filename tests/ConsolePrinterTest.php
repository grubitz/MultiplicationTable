<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Edmonds\MultiplicationTable;
use Edmonds\ConsolePrinter;

final class ConsolePrinterTest extends TestCase
{
    /** @var ConsolePrinter $printer contains the printer to test */
    private $printer;

    public function setUp(): void
    {
        $table = new MultiplicationTable(5);
        $this->printer = new ConsolePrinter($table);
        $this->setOutputCallback(function() {});
    }

    public function testCellsAreEqualSize(): void
    {
        $this->printer->print();
        $output = $this->getActualOutput();
        $output = str_replace([ConsolePrinter::COLOR_START, ConsolePrinter::COLOR_END], '', $output);

        $lines = explode("\n", $output);
        $cells = explode(ConsolePrinter::COL_DIVIDER_CHAR, $lines[0]);
        array_pop($cells);

        foreach ($cells as $cell) {
            $cellSize = strlen($cell);
            self::assertEquals(2, $cellSize);
        }
    }

    public function testEqualCountRowsAndColumns(): void
    {
        $this->printer->print();
        $output = $this->getActualOutput();

        $lines = explode("\n", $output);
        $cells = explode(ConsolePrinter::COL_DIVIDER_CHAR, $lines[0]);
        array_pop($cells);
        array_pop($lines);

        self::assertEquals((count($lines)-1), count($cells));
    }

    public function testHeadersAreHighlighted(): void
    {
        $this->printer->print();
        $output = $this->getActualOutput();

        $lines = explode("\n", $output);
        array_pop($lines);

        foreach ($lines as $index => $line) {
            if ($index < 2) {
                self::assertContains(ConsolePrinter::COLOR_START, $line);
                self::assertContains(ConsolePrinter::COLOR_END, $line);
                continue;
            }
            $cells = explode(ConsolePrinter::COL_DIVIDER_CHAR, $line);
            self::assertContains(ConsolePrinter::COLOR_START, $cells[0]);
            self::assertContains(ConsolePrinter::COLOR_END, $cells[1]);
        }
    }

    public function testDividerLengthEqualsRowLength(): void
    {
        $this->printer->print();
        $output = $this->getActualOutput();
        $output = str_replace([ConsolePrinter::COLOR_START, ConsolePrinter::COLOR_END], '', $output);

        $lines = explode("\n", $output);
        self::assertEquals(mb_strlen($lines[1]), mb_strlen($lines[0]));
    }
}
