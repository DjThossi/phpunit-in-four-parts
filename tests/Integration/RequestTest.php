<?php
namespace DjThossi\PHPUnit\IntegrationTest;

use DjThossi\PHPUnit\Exception\MissingGetParameterException;
use DjThossi\PHPUnit\Request;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DjThossi\PHPUnit\Request
 */
class RequestTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testCanCreateFromSuperGlobals(): void
    {
        $_GET['sku'] = 'My test sku';
        $request = Request::fromSuperGlobals();

        $this->assertInstanceOf(Request::class, $request);
    }

    public function testFromSuperGlobalsThrowsExceptionOnMissingParameter(): void
    {
        $this->expectException(MissingGetParameterException::class);

        Request::fromSuperGlobals();
    }
}
