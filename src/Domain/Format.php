<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Domain;

use DjThossi\PHPUnit\Exception\InvalidFormatException;

class Format
{
    /**
     * @var string
     */
    private $format;

    public function __construct(string $format)
    {
        $this->ensureFormatIsNotEmpty($format);
        $this->ensureFormatHasCorrectStructure($format);

        $this->format = $format;
    }

    public function asString(): string
    {
        return $this->format;
    }

    private function ensureFormatIsNotEmpty(string $format): void
    {
        if (empty($format)) {
            throw new InvalidFormatException('Format is not allowed to be empty');
        }
    }

    private function ensureFormatHasCorrectStructure(string $format): void
    {
        if (preg_match('/^F[\d]{3}$/', $format) !== 1) {
            throw new InvalidFormatException('Format has the wrong structure');
        }
    }
}
