<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Edmonds\MultiplicationTable;
use Edmonds\HTMLPrinter;

final class HTMLPrinterTest extends TestCase
{

    /** @var HTMLPrinter $printer contains the printer to test */
    private $printer;

    public function setUp(): void
    {
        $table = new MultiplicationTable(9);
        $this->printer = new HTMLPrinter($table);
        $this->setOutputCallback(function () {
        });
    }

    public function testEqualCountRowsAndColumns(): void
    {
        $this->printer->print();
        $output = $this->getActualOutput();

        $dom = new DOMDocument();
        $dom->loadXML($output);
        $rows = $dom->getElementsByTagName('tr');
        $rowCount = $rows->length;

        foreach ($rows as $row) {
            $cellCount = $row->getElementsByTagName('th')->length + $row->getElementsByTagName('td')->length;
            self::assertEquals($rowCount, $cellCount);
        }
    }

    public function testHeadersAreHighlighted(): void
    {
        $this->printer->print();
        $output = $this->getActualOutput();

        $dom = new DOMDocument();
        $dom->loadXML($output);
    
        $rows = $dom->getElementsByTagName('tr');
        foreach ($rows as $index => $row) {
            $rowTags = [];
            foreach ($row->childNodes as $element) {
                $rowTags[] = $element->tagName;
            }
            if ($index === 0) {
                self::assertContains('th', $rowTags);
                self::assertNotContains('td', $rowTags);
                continue;
            }
            self::assertEquals('th', $rowTags[0]);
            array_shift($rowTags);
            foreach ($rowTags as $tag) {
                self::assertEquals('td', $tag);
            }
        }
    }

    public function testCellsHaveExpectedSize(): void
    {
        $this->printer->print();
        $output = $this->getActualOutput();

        $dom = new DOMDocument();
        $dom->loadXML($output);
        $tds = $dom->getElementsByTagName('td');
        $ths = $dom->getElementsByTagName('th');
       
        foreach ($tds as $td) {
            self::assertEquals('width:10%', $td->attributes->item(0)->nodeValue);
        }
        foreach ($ths as $th) {
            if (count($th->attributes) === 0) {
                continue;
            }
            self::assertEquals('width:10%', $th->attributes->item(0)->nodeValue);
        }
    }
}
