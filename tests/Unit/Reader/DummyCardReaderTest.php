<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\UnitTest\Reader;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Domain\Sku;
use DjThossi\PHPUnit\Reader\ColorReader;
use DjThossi\PHPUnit\Reader\DummyCardReader;
use DjThossi\PHPUnit\Reader\OptionReader;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Reader\DummyCardReader
 */
class DummyCardReaderTest extends TestCase
{
    public function testCanGetCard(): void
    {
        /** @var MockObject|ColorCollection $colorsMock */
        $colorsMock = $this->createMock(ColorCollection::class);
        $colorsMock->expects($this->atLeastOnce())
            ->method('count')
            ->willReturn(1);

        /** @var MockObject|ColorReader $colorReaderMock */
        $colorReaderMock = $this->createMock(ColorReader::class);
        $colorReaderMock->expects($this->atLeastOnce())
            ->method('getColors')
            ->willReturn($colorsMock);

        /** @var MockObject|OptionReader $optionReaderMock */
        $optionReaderMock = $this->createMock(OptionReader::class);

        /** @var MockObject|Sku $skuMock */
        $skuMock = $this->createMock(Sku::class);
        $skuMock->expects($this->atLeastOnce())
            ->method('asString')
            ->willReturn('KAM11GG');

        $cardReader = new DummyCardReader($colorReaderMock, $optionReaderMock);

        $this->assertInstanceOf(Card::class, $cardReader->getCard($skuMock));
    }
}
