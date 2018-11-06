<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Edmonds\MultiplicationTable;

final class MultiplicationTableTest extends TestCase
{
    /** @var MultiplicationTable $table contains the table to test */
    private $table;

    public function setUp(): void
    {
        $this->table = new MultiplicationTable(10);
    }

    public function testGetSizeReturnsSize(): void
    {
        self::assertEquals(10, $this->table->getSize());
    }

    public function testGetValuesReturnsCorrectValues(): void
    {
        $values = $this->table->getValues();
        self::assertEquals(64, $values[8][7]);
        self::assertEquals(9, $values[3][2]);
        self::assertEquals(15, $values[5][2]);
    }
}
