<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\AcceptanceTest;

use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Factory;
use PHPUnit\Framework\TestCase;

class DummyCardReaderTest extends TestCase
{
    /**
     * @var Card
     */
    private $card;

    protected function setUp()
    {
        $factory = new Factory();
        $this->card = $factory->createCardReader()->getCard();
    }

    public function testName(): void
    {
        $this->assertEquals('30th Birthday invitation', $this->card->getName()->asString());
    }

    public function testFormat(): void
    {
        $this->assertEquals('F020', $this->card->getFormat()->asString());
    }

    public function testColors(): void
    {
        $colors = $this->card->getColors();
        $this->assertCount(1, $colors);

        $color = $colors->current();
        $this->assertEquals('C05', $color->asString());
    }

    public function testOptions(): void
    {
        $options = $this->card->getOptions();
        $this->assertCount(2, $options);

        $option = $options->current();
        $this->assertEquals('D01', $option->asString());

        $options->next();
        $option = $options->current();
        $this->assertEquals('V05', $option->asString());
    }
}
