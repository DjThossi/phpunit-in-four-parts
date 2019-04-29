<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\UnitTest\Domain;

use DjThossi\PHPUnit\Domain\Option;
use DjThossi\PHPUnit\Exception\InvalidOptionException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Domain\Option
 */
class OptionTest extends TestCase
{
    /**
     * @dataProvider workingOptionDataProvider
     *
     * @param string $optionCode
     */
    public function testCanRetrieveAsString(string $optionCode): void
    {
        $option = new Option($optionCode);

        $this->assertEquals($optionCode, $option->asString());
    }

    public function workingOptionDataProvider(): array
    {
        return [
            'option code V00' => ['V00'],
            'option code V01' => ['V01'],
            'option code V99' => ['V99'],
            'option code D00' => ['D00'],
            'option code D01' => ['D01'],
            'option code D99' => ['D99'],
        ];
    }

    /**
     * @dataProvider brokenOptionDataProvider
     *
     * @param string $optionCode
     */
    public function testWrongFormatThrowsException(string $optionCode): void
    {
        $this->expectException(InvalidOptionException::class);
        $this->expectExceptionMessage('Option has the wrong structure');

        new Option($optionCode);
    }

    public function brokenOptionDataProvider(): array
    {
        return [
            'option code A01' => ['A01'],
            'option code VVV' => ['VVV'],
        ];
    }
}
