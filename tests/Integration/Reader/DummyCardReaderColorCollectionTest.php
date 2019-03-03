<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\IntegrationTest\Reader;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Domain\Color;
use DjThossi\PHPUnit\Reader\ColorReader;
use DjThossi\PHPUnit\Reader\DummyCardReader;
use DjThossi\PHPUnit\Reader\OptionReader;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DummyCardReaderColorCollectionTest extends TestCase
{
    public function testCanGetCard(): void
    {
        $colors = new ColorCollection();
        $colors->addColor(new Color('C05'));

        /** @var MockObject|ColorReader $colorReaderMock */
        $colorReaderMock = $this->createMock(ColorReader::class);
        $colorReaderMock->expects($this->atLeastOnce())
            ->method('getColors')
            ->willReturn($colors);

        /** @var MockObject|OptionReader $optionReaderMock */
        $optionReaderMock = $this->createMock(OptionReader::class);

        $cardReader = new DummyCardReader($colorReaderMock, $optionReaderMock);

        $this->assertSame($colors, $cardReader->getCard()->getColors());
    }
}
