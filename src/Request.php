<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit;

use DjThossi\PHPUnit\Domain\Sku;
use DjThossi\PHPUnit\Exception\MissingGetParameterException;

class Request
{
    /**
     * @var Sku
     */
    private $sku;

    public function __construct(Sku $sku)
    {
        $this->sku = $sku;
    }

    public static function fromSuperGlobals(): self
    {
        self::ensureSkuIsInGetVariable();

        return new self(new Sku($_GET['sku']));
    }

    public function getSku(): Sku
    {
        return $this->sku;
    }

    private static function ensureSkuIsInGetVariable(): void
    {
        if (!isset($_GET['sku'])) {
            throw new MissingGetParameterException('Missing field sku in $_GET');
        }
    }
}
