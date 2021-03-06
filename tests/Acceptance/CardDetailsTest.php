<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\AcceptanceTest;

use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Domain\Sku;
use DjThossi\PHPUnit\Factory;
use DjThossi\PHPUnit\Request;
use PHPUnit\Framework\TestCase;

class CardDetailsTest extends TestCase
{
    /**
     * @var Card
     */
    private $card;

    protected function setUp(): void
    {
        $request = new Request(new Sku('KAM11GG'));

        $factory = new Factory();
        $application = $factory->createApplication();
        $this->card = $application->run($request);
    }

    public function testSku(): void
    {
        $this->assertEquals('KAM11GG', $this->card->getSku()->asString());
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
