<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Reader;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Collection\OptionCollection;
use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Domain\Color;
use DjThossi\PHPUnit\Domain\Format;
use DjThossi\PHPUnit\Domain\Option;
use DjThossi\PHPUnit\Domain\Sku;
use DjThossi\PHPUnit\Exception\SkuNotFoundException;

class DummyCardReader implements CardReader
{
    public function getCard(Sku $sku): Card
    {
        if ($sku->asString() !== 'KAM11GG') {
            throw new SkuNotFoundException('Provided SKU not found');
        }

        $colors = new ColorCollection();
        $colors->addColor(new Color('C05'));

        $options = new OptionCollection();
        $options->addOption(new Option('D01'));
        $options->addOption(new Option('V05'));

        return new Card(
            new Sku('KAM11GG'),
            new Format('F020'),
            $colors,
            $options
        );
    }
}
