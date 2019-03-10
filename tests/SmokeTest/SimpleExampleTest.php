<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\SmokeTest;

use DjThossi\SmokeTestingPhp\Collection\UrlCollection;
use DjThossi\SmokeTestingPhp\Options\SmokeTestOptions;
use DjThossi\SmokeTestingPhp\Result\Result;
use DjThossi\SmokeTestingPhp\SmokeTestTrait;
use DjThossi\SmokeTestingPhp\ValueObject\BasicAuth;
use DjThossi\SmokeTestingPhp\ValueObject\BodyLength;
use DjThossi\SmokeTestingPhp\ValueObject\Concurrency;
use DjThossi\SmokeTestingPhp\ValueObject\FollowRedirect;
use DjThossi\SmokeTestingPhp\ValueObject\Header;
use DjThossi\SmokeTestingPhp\ValueObject\HeaderKey;
use DjThossi\SmokeTestingPhp\ValueObject\RequestTimeout;
use DjThossi\SmokeTestingPhp\ValueObject\TimeToFirstByte;
use PHPUnit\Framework\TestCase;

class SimpleExampleTest extends TestCase
{
    use SmokeTestTrait;

    /**
     * @dataProvider myDataProvider
     *
     * @param Result $result
     */
    public function testExample(Result $result): void
    {
        $this->assertSuccess($result);
        $this->assertTimeToFirstByteBelow(new TimeToFirstByte(2000), $result);
        $this->assertBodyNotEmpty($result);
        $this->assertHasHeaderKey(new HeaderKey('Status-Line'), $result);
        $this->assertHasHeader(Header::fromPrimitives('Status-Line', 'HTTP/1.1 200 OK'), $result);
    }

    /**
     * @return array
     */
    public function myDataProvider(): array
    {
        $urls = [
            'http://web?sku=KAM11GG',
            'http://web/?sku=KAM11GG',
        ];

        $options = new SmokeTestOptions(
            UrlCollection::fromStrings($urls),
            new RequestTimeout(2),
            new FollowRedirect(true),
            new Concurrency(10),
            new BodyLength(500),
            new BasicAuth('username', 'password')
        );

        return $this->runSmokeTests($options);
    }
}
