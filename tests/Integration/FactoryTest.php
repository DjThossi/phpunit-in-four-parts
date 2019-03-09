<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\IntegrationTest;

use DjThossi\PHPUnit\Factory;
use DjThossi\PHPUnit\Reader\DummyCardReader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Factory
 */
class FactoryTest extends TestCase
{
    /**
     * @var Factory
     */
    private $factory;

    protected function setUp(): void
    {
        $this->factory = new Factory();
    }

    public function testCreateCardReader(): void
    {
        $this->assertInstanceOf(
            DummyCardReader::class,
            $this->factory->createCardReader()
        );
    }
}
