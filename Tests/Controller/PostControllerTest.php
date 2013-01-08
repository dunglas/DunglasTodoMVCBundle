<?php

namespace Dunglas\ChaplinDemoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{

    const POST_BODY1 = 'Et s\'il est un être qui avant nous et plus que nous ait mérité l\'enfer, il faut bien que je le nomme, c\'est Dieu.';
    const POST_BODY2 = 'Il n\'y a que deux routes pour la classe ouvrière, la Liberté, ou la victoire des fascistes, qui veut dire la Tyrannie. Les combattants des deux côtés savent ce qui est en réserve pour le perdant. Nous sommes prêts à mettre fin au fascisme une fois pour toutes, même en dépit du gouvernement Républicain.';

    private $client;

    private function request($method, $uri, $data = null)
    {
        $this->client = static::createClient();
        $this->client->request($method, $uri, array(), array(), $data === null ? array() : array('CONTENT_TYPE' => 'application/json'), $data === null ? null : json_encode($data));
    }

    private function assertJson($response)
    {
        $this->assertTrue(
                $response->headers->contains('Content-Type', 'application/json')
        );
    }

    public function testCpost()
    {
        $this->request('POST', '/api/posts', array('body' => static::POST_BODY1));
        $response = $this->client->getResponse();

        $this->assertJson($response);

        $post = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('id', $post);
        $this->assertArrayHasKey('body', $post);
        $this->assertEquals(static::POST_BODY1, $post['body']);

        return $post['id'];
    }

    /**
     * @depends testCpost
     */
    public function testCget($id)
    {
        $this->request('GET', '/api/posts');
        $response = $this->client->getResponse();

        $this->assertJson($response);

        $posts = json_decode($response->getContent(), true);

        /* $found = array_reduce($posts, function ($result, $item) use ($id) {
          return $result || $item['id'] === $id;
          }, false); */

        $found = false;
        foreach ($posts as $post) {
            if ($post['id'] === $id) {
                $found = true;
                break;
            }
        }

        $this->assertTrue($found);

        return $id;
    }

    /**
     * @depends testCget
     */
    public function testPut($id)
    {
        $this->request('PUT', '/api/posts/' . $id, array('body' => static::POST_BODY2));
        $response = $this->client->getResponse();

        $this->assertJson($response);
        $this->assertEquals(204, $response->getStatusCode());

        return $id;
    }

    /**
     * @depends testPut
     */
    public function testGet($id)
    {
        $this->request('GET', '/api/posts/' . $id);
        $response = $this->client->getResponse();

        $post = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('id', $post);
        $this->assertArrayHasKey('body', $post);
        $this->assertEquals($id, $post['id']);
        $this->assertEquals(static::POST_BODY2, $post['body']);

        return $id;
    }

    /**
     * @depends testGet
     */
    public function testDelete($id)
    {
        $this->request('DELETE', '/api/posts/' . $id);
        $response = $this->client->getResponse();

        $this->assertJson($response);
        $this->assertEquals(204, $response->getStatusCode());
    }

    /**
     * @depends testDelete
     */
    public function testCgetDeleted($id)
    {
        $this->request('GET', '/api/posts');
        $response = $this->client->getResponse();

        $this->assertJson($response);

        $posts = json_decode($response->getContent(), true);
        $found = false;
        foreach ($posts as $post) {
            if ($post['id'] === $id) {
                $found = true;
                break;
            }
        }

        $this->assertFalse($found);
    }

}