<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Edmonds\Validator;

final class ValidatorTest extends TestCase
{
    
    public function testReturnsPassedValueForValidInput(): void
    {
        $this->assertEquals(3, Validator::validateSize(3));
    }

    public function testReturnsDefaultValueForNonNumericalInput(): void
    {
        $this->assertEquals(10, Validator::validateSize('pigeon'));
    }

    public function testReturnsDefaultValueForOutOfRangeInput(): void
    {
        $this->assertEquals(10, Validator::validateSize('9001'));
    }
}