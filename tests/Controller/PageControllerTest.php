<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageControllerTest extends WebTestCase
{
    public function test_hello_page(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/hello');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello World');
    }

    /**
     * @dataProvider sameHandleParametersUnsuccessfulUrlProvider
     */
    public function test_same_handle_parameters_unsuccessful($url): void
    {
        $client = static::createClient();

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $crawler = $client->request('GET', $url);
    }

    public function test_mod_parameters_unsuccessful(): void
    {
        $client = static::createClient();

        $client->catchExceptions(false);
        $this->expectException(NotFoundHttpException::class);

        $crawler = $client->request('GET', '/knplabs/symfony/dog');
    }

    /**
     * @dataProvider successfulUrlProvider
     */
    public function test_successful_pages($url): void
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertResponseIsSuccessful();

    }

    public function sameHandleParametersUnsuccessfulUrlProvider()
    {
        yield ['/symfony/symfony'];
        yield ['/knplabs/knplabs/mod'];
        yield ['/symfony/symfony/fib'];
    }

    public function successfulUrlProvider()
    {
        yield ['/knplabs/symfony/mod'];
        yield ['/symfony/knplabs/fib'];
        yield ['/potus/github'];
    }
}
