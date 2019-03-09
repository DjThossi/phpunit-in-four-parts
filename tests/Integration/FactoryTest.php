<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\IntegrationTest;

use DjThossi\PHPUnit\Application;
use DjThossi\PHPUnit\Factory;
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

    public function testCreateApplication(): void
    {
        $this->assertInstanceOf(
            Application::class,
            $this->factory->createApplication()
        );
    }
}
