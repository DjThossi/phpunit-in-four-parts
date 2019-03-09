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
            'Structure V01' => ['V01'],
            'Structure D01' => ['D01'],
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
            'Structure A01' => ['A01'],
            'Structure AAA' => ['AAA'],
        ];
    }
}
