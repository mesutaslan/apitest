<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthControllerTest extends WebTestCase
{
    public function testCreateTokenTrue()
    {
        $client = static::createClient();

        $client->request('POST', '/create-token', ['_username'=>'mesut', '_password'=>'123456']);
        $response = json_decode($client->getResponse()->getContent());

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(true, $response->success);
    }

    public function testCreateTokenFalse()
    {
        $client = static::createClient();

        $client->request('GET', '/create-token', ['_username'=>'mesut', '_password'=>'123456']);
        $response = json_decode($client->getResponse()->getContent());

        $this->assertEquals(405, $client->getResponse()->getStatusCode());
        $this->assertEquals(false, $response->success);
        $this->assertContains('Method Not Allowed', $response->error->message);

    }

    public function testRegisterTrue()
    {
        $client = static::createClient();

        $client->request('POST', '/register', ['_username'=>'mesut'.rand(1,1000000), '_password'=>'123456']);
        $response = json_decode($client->getResponse()->getContent());

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
        $this->assertEquals(true, $response->success);
        $this->assertContains('successfully created', $response->data->result);
    }

    public function testRegisterMethodNotAllowed()
    {
        $client = static::createClient();

        $client->request('PUT', '/register', ['_username'=>'mesut'.rand(1,1000000), '_password'=>'123456']);
        $response = json_decode($client->getResponse()->getContent());

        $this->assertEquals(405, $client->getResponse()->getStatusCode());
        $this->assertEquals(false, $response->success);
        $this->assertContains('Method Not Allowed', $response->error->message);
    }

    public function testRegisterCannotBeNull()
    {
        $client = static::createClient();

        $client->request('POST', '/register', ['username'=>'mesut'.rand(1,1000000), 'password'=>'123456']);
        $response = json_decode($client->getResponse()->getContent());

        $this->assertEquals(409, $client->getResponse()->getStatusCode());
        $this->assertEquals(false, $response->success);
        $this->assertContains('cannot be null', $response->error->message);
    }

    public function testRegisterAlreadyExist()
    {
        $client = static::createClient();

        $client->request('POST', '/register', ['_username'=>'mesut', '_password'=>'123456']);
        $response = json_decode($client->getResponse()->getContent());

        $this->assertEquals(409, $client->getResponse()->getStatusCode());
        $this->assertEquals(false, $response->success);
        $this->assertContains('is already exist', $response->error->message);
    }
}
