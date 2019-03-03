<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Domain;

use DjThossi\PHPUnit\Exception\InvalidNameException;

class Name
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->ensureNameIsNotEmpty($name);

        $this->name = $name;
    }

    public function asString(): string
    {
        return $this->name;
    }

    private function ensureNameIsNotEmpty(string $name): void
    {
        if (empty($name)) {
            throw new InvalidNameException('Name is not allowed to be empty');
        }
    }
}
