<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Edmonds\MultiplicationTable;

final class MultiplicationTableTest extends TestCase
{
    private $table;

    public function setUp(): void
    {
        $this->table = new MultiplicationTable(10);
    }

    public function testGetSizeReturnsSize(): void
    {
        $this->assertEquals(10, $this->table->getSize());
    }

    public function testGetValuesReturnsCorrectValues(): void
    {
        $values = $this->table->getValues();
        $this->assertEquals(64, $values[8][7]);
        $this->assertEquals(9, $values[3][2]);
        $this->assertEquals(15, $values[5][2]);
    }
}
