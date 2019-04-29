<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\UnitTest\Collection;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Domain\Color;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Collection\ColorCollection
 * @covers \DjThossi\PHPUnit\Collection\BaseCollection
 */
class ColorCollectionTest extends TestCase
{
    public function testCanCanAddColor(): void
    {
        $colors = new ColorCollection();
        $this->assertEmpty($colors);

        $colors->addColor(new Color('C05'));
        $this->assertCount(1, $colors);
    }
}
