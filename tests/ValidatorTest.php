<?php
declare(strict_types=1);

namespace Edmonds;

use PHPUnit\Framework\TestCase;

final class ValidatorTest extends TestCase
{
    /** @var Validator $validator contains the validator object to test */
    private $validator;

    public function setUp(): void
    {
        $this->validator = new Validator();
    }

    public function testReturnsPassedValueForValidInput(): void
    {
        self::assertEquals(3, $this->validator->validateSize(3));
    }

    public function testReturnsDefaultValueForNonNumericalInput(): void
    {
        self::assertEquals(10, $this->validator->validateSize('pigeon'));
    }

    public function testReturnsDefaultValueForOutOfRangeInput(): void
    {
        self::assertEquals(10, $this->validator->validateSize('9001'));
    }
}
