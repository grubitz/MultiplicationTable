<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Edmonds\MultiplicationTable;
use Edmonds\ConsolePrinter;

final class ConsolePrinterTest extends TestCase
{
    private $printer;

    public function setUp()
    {
        $mt = new MultiplicationTable(5);
        $this->printer = new ConsolePrinter($mt);
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
            $cellSize = strlen((string)$cell);
            $this->assertEquals(2, $cellSize);
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

        $this->assertEquals((count($lines)-1), count($cells));
    }

    public function testHeadersAreHighlighted(): void
    {
        $this->printer->print();
        $output = $this->getActualOutput();

        $lines = explode("\n", $output);
        array_pop($lines);

        foreach ($lines as $index => $line) {
            if ($index < 2) {
                $this->assertContains(ConsolePrinter::COLOR_START, $line);
                $this->assertContains(ConsolePrinter::COLOR_END, $line);
                continue;
            }
            $cells = explode(ConsolePrinter::COL_DIVIDER_CHAR, $line);
            $this->assertContains(ConsolePrinter::COLOR_START, $cells[0]);
            $this->assertContains(ConsolePrinter::COLOR_END, $cells[1]);
        }
    }
}