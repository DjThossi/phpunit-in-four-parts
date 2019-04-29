<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\UnitTest\Domain;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Collection\OptionCollection;
use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Domain\Format;
use DjThossi\PHPUnit\Domain\Sku;
use DjThossi\PHPUnit\Exception\InvalidColorCollectionException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Domain\Card
 */
class CardTest extends TestCase
{
    public function testCanCreateInstance(): void
    {
        /** @var MockObject|Sku $skuMock */
        $skuMock = $this->createMock(Sku::class);

        /** @var MockObject|Format $formatMock */
        $formatMock = $this->createMock(Format::class);

        /** @var MockObject|ColorCollection $colorsMock */
        $colorsMock = $this->createMock(ColorCollection::class);
        $colorsMock->method('count')
            ->willReturn(1);

        /** @var MockObject|OptionCollection $optionsMock */
        $optionsMock = $this->createMock(OptionCollection::class);

        $card = new Card($skuMock, $formatMock, $colorsMock, $optionsMock);

        $this->assertInstanceOf(Card::class, $card);
    }

    public function testCanRetrieveSku(): void
    {
        /** @var MockObject|Sku $skuMock */
        $skuMock = $this->createMock(Sku::class);

        /** @var MockObject|Format $formatMock */
        $formatMock = $this->createMock(Format::class);

        /** @var MockObject|ColorCollection $colorsMock */
        $colorsMock = $this->createMock(ColorCollection::class);
        $colorsMock->method('count')
            ->willReturn(1);

        /** @var MockObject|OptionCollection $optionsMock */
        $optionsMock = $this->createMock(OptionCollection::class);

        $card = new Card($skuMock, $formatMock, $colorsMock, $optionsMock);

        $this->assertSame($skuMock, $card->getSku());
    }

    public function testCanRetrieveFormat(): void
    {
        /** @var MockObject|Sku $skuMock */
        $skuMock = $this->createMock(Sku::class);

        /** @var MockObject|Format $formatMock */
        $formatMock = $this->createMock(Format::class);

        /** @var MockObject|ColorCollection $colorsMock */
        $colorsMock = $this->createMock(ColorCollection::class);
        $colorsMock->method('count')
            ->willReturn(1);

        /** @var MockObject|OptionCollection $optionsMock */
        $optionsMock = $this->createMock(OptionCollection::class);

        $card = new Card($skuMock, $formatMock, $colorsMock, $optionsMock);

        $this->assertSame($formatMock, $card->getFormat());
    }

    public function testCanRetrieveColors(): void
    {
        /** @var MockObject|Sku $skuMock */
        $skuMock = $this->createMock(Sku::class);

        /** @var MockObject|Format $formatMock */
        $formatMock = $this->createMock(Format::class);

        /** @var MockObject|ColorCollection $colorsMock */
        $colorsMock = $this->createMock(ColorCollection::class);
        $colorsMock->method('count')
            ->willReturn(1);

        /** @var MockObject|OptionCollection $optionsMock */
        $optionsMock = $this->createMock(OptionCollection::class);

        $card = new Card($skuMock, $formatMock, $colorsMock, $optionsMock);

        $this->assertSame($colorsMock, $card->getColors());
    }

    public function testCanRetrieveOptions(): void
    {
        /** @var MockObject|Sku $skuMock */
        $skuMock = $this->createMock(Sku::class);

        /** @var MockObject|Format $formatMock */
        $formatMock = $this->createMock(Format::class);

        /** @var MockObject|ColorCollection $colorsMock */
        $colorsMock = $this->createMock(ColorCollection::class);
        $colorsMock->method('count')
            ->willReturn(1);

        /** @var MockObject|OptionCollection $optionsMock */
        $optionsMock = $this->createMock(OptionCollection::class);

        $card = new Card($skuMock, $formatMock, $colorsMock, $optionsMock);

        $this->assertSame($optionsMock, $card->getOptions());
    }

    public function testThrowsExceptionIfColorCollectionIsEmpty(): void
    {
        /** @var MockObject|Sku $skuMock */
        $skuMock = $this->createMock(Sku::class);

        /** @var MockObject|Format $formatMock */
        $formatMock = $this->createMock(Format::class);

        /** @var MockObject|ColorCollection $colorsMock */
        $colorsMock = $this->createMock(ColorCollection::class);
        $colorsMock->method('count')
            ->willReturn(0);

        /** @var MockObject|OptionCollection $optionsMock */
        $optionsMock = $this->createMock(OptionCollection::class);

        $this->expectException(InvalidColorCollectionException::class);
        $this->expectExceptionMessage('Every card has at least one color');

        new Card($skuMock, $formatMock, $colorsMock, $optionsMock);
    }
}
