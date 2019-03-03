<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Domain;

use DjThossi\PHPUnit\Exception\InvalidColorException;

class Color
{
    /**
     * @var string
     */
    private $color;

    public function __construct(string $color)
    {
        $this->ensureColorIsNotEmpty($color);
        $this->ensureColorHasCorrectStructure($color);

        $this->color = $color;
    }

    public function asString(): string
    {
        return $this->color;
    }

    private function ensureColorIsNotEmpty(string $color): void
    {
        if (empty($color)) {
            throw new InvalidColorException('Color is not allowed to be empty');
        }
    }

    private function ensureColorHasCorrectStructure(string $color): void
    {
        if (preg_match('/^C[\d]{2}$/', $color) !== 1) {
            throw new InvalidColorException('Color has the wrong structure');
        }
    }
}
