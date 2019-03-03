<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Domain;

use DjThossi\PHPUnit\Collection\ColorCollection;
use DjThossi\PHPUnit\Collection\OptionCollection;
use DjThossi\PHPUnit\Exception\InvalidColorCollectionException;

class Card
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

    public function __construct(Name $name, Format $format, ColorCollection $colors, OptionCollection $options)
    {
        $this->ensureBookHasAtLeastOneColor($colors);

        $this->name = $name;
        $this->format = $format;
        $this->colors = $colors;
        $this->options = $options;
    }

    public function getName(): Name
    {
        return $this->name;
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

    private function ensureBookHasAtLeastOneColor(ColorCollection $colors): void
    {
        if ($colors->count() > 0) {
            return;
        }

        throw new InvalidColorCollectionException('Every card has at least one color');
    }
}
