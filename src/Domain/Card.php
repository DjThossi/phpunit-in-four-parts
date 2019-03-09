<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Domain;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Collection\OptionCollection;
use DjThossi\PHPUnit\Exception\InvalidColorCollectionException;

class Card
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

    public function __construct(Sku $sku, Format $format, ColorCollection $colors, OptionCollection $options)
    {
        $this->ensureCardHasAtLeastOneColor($colors);

        $this->sku = $sku;
        $this->format = $format;
        $this->colors = $colors;
        $this->options = $options;
    }

    public function getSku(): Sku
    {
        return $this->sku;
    }

    public function getFormat(): Format
    {
        return $this->format;
    }

    public function getColors(): ColorCollection
    {
        return $this->colors;
    }

    public function getOptions(): OptionCollection
    {
        return $this->options;
    }

    private function ensureCardHasAtLeastOneColor(ColorCollection $colors): void
    {
        if ($colors->count() > 0) {
            return;
        }

        throw new InvalidColorCollectionException('Every card has at least one color');
    }
}
