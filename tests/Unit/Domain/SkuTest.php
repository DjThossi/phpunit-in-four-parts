<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\UnitTest\Domain;

use DjThossi\PHPUnit\Domain\Sku;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Domain\Sku
 */
class SkuTest extends TestCase
{
    public function testCanCreateInstance(): void
    {
        $sku = new Sku('KAM02GG');

        $this->assertInstanceOf(Sku::class, $sku);
    }

    public function testCanRetrieveAsString(): void
    {
        $expectedSku = 'KAM03GG';
        $sku = new Sku($expectedSku);

        $this->assertEquals($expectedSku, $sku->asString());
    }
}
