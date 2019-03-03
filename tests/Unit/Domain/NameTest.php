<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\UnitTest\Domain;

use DjThossi\PHPUnit\Domain\Name;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Domain\Name
 */
class NameTest extends TestCase
{
    public function testCanCreateInstance(): void
    {
        $name = new Name('Christmas Greetings');

        $this->assertInstanceOf(Name::class, $name);
    }

    public function testCanRetrieveAsString(): void
    {
        $expectedName = 'Joyeuses Pâques!';
        $name = new Name($expectedName);

        $this->assertEquals($expectedName, $name->asString());
    }
}
