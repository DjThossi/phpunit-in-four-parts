<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Domain;

use DjThossi\PHPUnit\Exception\InvalidSkuException;

class Sku
{
    /**
     * @var string
     */
    private $sku;

    public function __construct(string $sku)
    {
        $this->ensureSkuIsNotEmpty($sku);

        $this->sku = $sku;
    }

    public function asString(): string
    {
        return $this->sku;
    }

    private function ensureSkuIsNotEmpty(string $sku): void
    {
        if (empty($sku)) {
            throw new InvalidSkuException('Sku is not allowed to be empty');
        }
    }
}
