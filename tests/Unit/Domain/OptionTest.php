<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\UnitTest\Domain;

use DjThossi\PHPUnit\Domain\Option;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Domain\Option
 */
class OptionTest extends TestCase
{
    /**
     * @dataProvider optionDataProvider
     *
     * @param mixed $optionCode
     */
    public function testCanRetrieveAsString($optionCode): void
    {
        $option = new Option($optionCode);

        $this->assertEquals($optionCode, $option->asString());
    }

    public function optionDataProvider(): array
    {
        return [
            'Structure V01' => ['V01'],
            'Structure D01' => ['D01'],
        ];
    }
}
