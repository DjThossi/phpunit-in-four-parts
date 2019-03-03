<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\IntegrationTest\Reader;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Collection\OptionCollection;
use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Domain\Color;
use DjThossi\PHPUnit\Domain\Format;
use DjThossi\PHPUnit\Domain\Name;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CardGetterTest extends TestCase
{
    /**
     * @var Name
     */
    private $name;

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

    protected function setUp()
    {
        $this->name = new Name('Test Name');
        $this->format = new Format('F020');
        $this->colors = new ColorCollection();
        $this->options = new OptionCollection();

        /** @var MockObject|Color $colorMock */
        $colorMock = $this->createMock(Color::class);
        $this->colors->addColor($colorMock);

        $this->card = new Card($this->name, $this->format, $this->colors, $this->options);
    }

    public function testCanRetrieveName(): void
    {
        $this->assertSame($this->name, $this->card->getName());
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
