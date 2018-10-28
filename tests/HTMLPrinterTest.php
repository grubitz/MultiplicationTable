<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Edmonds\MultiplicationTable;
use Edmonds\HTMLPrinter;

final class HTMLPrinterTest extends TestCase
{
    private $printer;

    public function setUp()
    {
        $mt = new MultiplicationTable(5);
        $this->printer = new HTMLPrinter($mt);
        $this->setOutputCallback(function() {});
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
            $this->assertEquals($rowCount, $cellCount);
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
                $this->assertContains('th', $rowTags);
                $this->assertNotContains('td', $rowTags);
                continue;
            }
            $this->assertEquals('th', $rowTags[0]);
            array_shift($rowTags);
            foreach ($rowTags as $tag) {
                $this->assertEquals('td', $tag);
            }
        }        
    }
}