<?php

namespace M1guelpf\LaraccessApi\Test;

use GuzzleHttp\Client;
use M1guelpf\LaraccessApi\Laraccess;

class LaraccessTest extends \PHPUnit_Framework_TestCase
{
    /** @var \M1guelpf\LaraccessApi\Laraccess */
    protected $laraccess;

    public function setUp()
    {
        $this->laraccess = new Laraccess();

        parent::setUp();
    }

    /** @test */
    public function it_does_not_have_token()
    {
        $this->assertNull($this->laraccess->apiToken);
    }

    /** @test */
    public function you_can_set_api_token()
    {
        $this->laraccess->connect('API_TOKEN');
        $this->assertEquals('API_TOKEN', $this->laraccess->apiToken);
    }

    /** @test */
    public function you_can_get_client()
    {
        $this->assertInstanceOf(Client::class, $this->laraccess->getClient());
    }

    /** @test */
    public function you_can_set_client()
    {
        $newClient = new Client(['base_uri' => 'http://foo.bar']);
        $this->assertInstanceOf(Client::class, $newClient);
        $this->assertNotEquals($this->laraccess->getClient(), $newClient);
        $this->laraccess->setClient($newClient);
        $this->assertEquals($newClient, $this->laraccess->getClient());
    }
}
