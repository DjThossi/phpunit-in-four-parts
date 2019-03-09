<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\IntegrationTest\Reader;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Collection\OptionCollection;
use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Domain\Color;
use DjThossi\PHPUnit\Domain\Format;
use DjThossi\PHPUnit\Domain\Sku;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CardGetterTest extends TestCase
{
    /**
     * @var Sku
     */
    private $sku;

    /**
     * @var Format
     */
    private $format;

    /**
     * @var ColorCollection
     */
    private $colors;

    /**
     * @var OptionCollection
     */
    private $options;

    /**
     * @var Card
     */
    private $card;

    protected function setUp(): void
    {
        $this->sku = new Sku('KAM01GG');
        $this->format = new Format('F020');
        $this->colors = new ColorCollection();
        $this->options = new OptionCollection();

        /** @var MockObject|Color $colorMock */
        $colorMock = $this->createMock(Color::class);
        $this->colors->addColor($colorMock);

        $this->card = new Card($this->sku, $this->format, $this->colors, $this->options);
    }

    public function testCanRetrieveSku(): void
    {
        $this->assertSame($this->sku, $this->card->getSku());
    }

    public function testCanRetrieveFormat(): void
    {
        $this->assertSame($this->format, $this->card->getFormat());
    }

    public function testCanRetrieveColors(): void
    {
        $this->assertSame($this->colors, $this->card->getColors());
    }

    public function testCanRetrieveOptions(): void
    {
        $this->assertSame($this->options, $this->card->getOptions());
    }
}
