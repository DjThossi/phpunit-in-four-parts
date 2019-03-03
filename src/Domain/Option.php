<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Domain;

use DjThossi\PHPUnit\Exception\InvalidOptionException;

class Option
{
    /**
     * @var string
     */
    private $option;

    public function __construct(string $option)
    {
        $this->ensureCommentIsNotEmpty($option);
        $this->ensureOptionHasCorrectStructure($option);

        $this->option = $option;
    }

    public function asString(): string
    {
        return $this->option;
    }

    private function ensureCommentIsNotEmpty(string $option): void
    {
        if (empty($option)) {
            throw new InvalidOptionException('Option is not allowed to be empty');
        }
    }

    private function ensureOptionHasCorrectStructure(string $option): void
    {
        if (preg_match('/^[DV][\d]{2}$/', $option) !== 1) {
            throw new InvalidOptionException('Option has the wrong structure');
        }
    }
}
