<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\UnitTest\Domain;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Collection\OptionCollection;
use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Domain\Format;
use DjThossi\PHPUnit\Domain\Name;
use DjThossi\PHPUnit\Exception\InvalidColorCollectionException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Domain\Card
 */
class SimplifiedCardTest extends TestCase
{
    /**
     * @var MockObject|Name
     */
    private $nameMock;

    /**
     * @var MockObject|Format
     */
    private $formatMock;

    /**
     * @var MockObject|ColorCollection
     */
    private $colorsMock;

    /**
     * @var MockObject|OptionCollection
     */
    private $optionsMock;

    protected function setUp()
    {
        $this->nameMock = $this->createMock(Name::class);
        $this->formatMock = $this->createMock(Format::class);
        $this->colorsMock = $this->createMock(ColorCollection::class);
        $this->optionsMock = $this->createMock(OptionCollection::class);
    }

    public function testCanCreateInstance(): void
    {
        $this->setColorsCount(1);
        $card = new Card($this->nameMock, $this->formatMock, $this->colorsMock, $this->optionsMock);

        $this->assertInstanceOf(Card::class, $card);
    }

    public function testCanRetrieveName(): void
    {
        $this->setColorsCount(1);
        $card = new Card($this->nameMock, $this->formatMock, $this->colorsMock, $this->optionsMock);

        $this->assertSame($this->nameMock, $card->getName());
    }

    public function testCanRetrieveFormat(): void
    {
        $this->setColorsCount(1);
        $card = new Card($this->nameMock, $this->formatMock, $this->colorsMock, $this->optionsMock);

        $this->assertSame($this->formatMock, $card->getFormat());
    }

    public function testCanRetrieveColors(): void
    {
        $this->setColorsCount(1);
        $card = new Card($this->nameMock, $this->formatMock, $this->colorsMock, $this->optionsMock);

        $this->assertSame($this->colorsMock, $card->getColors());
    }

    public function testCanRetrieveOptions(): void
    {
        $this->setColorsCount(1);
        $card = new Card($this->nameMock, $this->formatMock, $this->colorsMock, $this->optionsMock);

        $this->assertSame($this->optionsMock, $card->getOptions());
    }

    public function testThrowsExceptionIfColorCollectionIsEmpty(): void
    {
        $this->setColorsCount(0);

        $this->expectException(InvalidColorCollectionException::class);
        $this->expectExceptionMessage('Every card has at least one color');

        new Card($this->nameMock, $this->formatMock, $this->colorsMock, $this->optionsMock);
    }

    private function setColorsCount(int $count): void
    {
        $this->colorsMock->expects($this->once())
            ->method('count')
            ->willReturn($count);
    }
}
