<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\UnitTest\Collection;

use DjThossi\PHPUnit\Collection\OptionCollection;
use DjThossi\PHPUnit\Domain\Option;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Collection\OptionCollection
 */
class OptionCollectionTest extends TestCase
{
    public function testCanCanAddOption(): void
    {
        $options = new OptionCollection();
        $this->assertEmpty($options);

        /** @var Option|MockObject $option */
        $option = $this->createMock(Option::class);

        $options->addOption($option);
        $this->assertCount(1, $options);
    }
}
