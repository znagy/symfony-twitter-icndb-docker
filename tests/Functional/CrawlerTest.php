<?php

namespace App\Tests\Functional;

use App\Service\TwitterApiClient;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CrawlerTest extends KernelTestCase
{
    public function test_twitter_api_client(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        $twitterApiClient = static::getContainer()->get(TwitterApiClient::class);

        $items = $twitterApiClient->fetchUserTimeline('knplabs', 20);

        $this->assertIsArray($items);
        $this->assertCount(20, $items);
    }
}
