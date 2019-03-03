<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\UnitTest\Domain;

use DjThossi\PHPUnit\Domain\Format;
use DjThossi\PHPUnit\Exception\InvalidFormatException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Domain\Format
 */
class FormatTest extends TestCase
{
    public function testEmptyStringWillThrowException(): void
    {
        $this->expectException(InvalidFormatException::class);
        $this->expectExceptionMessage('Format is not allowed to be empty');

        new Format('');
    }

    public function testWrongFormatWillThrowException(): void
    {
        $this->expectException(InvalidFormatException::class);
        $this->expectExceptionMessage('Format has the wrong structure');

        new Format('Foo');
    }
}
