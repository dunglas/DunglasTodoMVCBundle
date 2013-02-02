<?php

namespace Dunglas\TodoMVCBundle\Tests\Functional;

/**
 * Tests the JSON API
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class TodoControllerTest extends WebTestCase
{

    const POST_BODY1 = 'Et s\'il est un être qui avant nous et plus que nous ait mérité l\'enfer, il faut bien que je le nomme, c\'est Dieu.';
    const POST_BODY2 = 'Il n\'y a que deux routes pour la classe ouvrière, la Liberté, ou la victoire des fascistes, qui veut dire la Tyrannie. Les combattants des deux côtés savent ce qui est en réserve pour le perdant. Nous sommes prêts à mettre fin au fascisme une fois pour toutes, même en dépit du gouvernement Républicain.';

    protected function setUp()
    {
        $this->client = static::createClient();
        
        parent::setUp();
    }

    private function request($method, $uri, $data = null)
    {

        $this->client->request($method, $uri, array(), array(), $data === null ? array() : array('CONTENT_TYPE' => 'application/json'), $data === null ? null : json_encode($data));
    }

    private function assertJson($response)
    {
        $this->assertTrue(
                $response->headers->contains('Content-Type', 'application/json')
        );
    }

    public function testCtodo()
    {
        $this->request('POST', '/api/todos', array('title' => static::POST_BODY1, 'completed' => true));
        $response = $this->client->getResponse();

        $this->assertJson($response);

        $todo = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('id', $todo);
        $this->assertArrayHasKey('title', $todo);
        $this->assertArrayHasKey('completed', $todo);
        $this->assertEquals(static::POST_BODY1, $todo['title']);
        
        return $todo['id'];
    }

    /**
     * @depends testCtodo
     */
    public function testCget($id)
    {
        $this->request('GET', '/api/todos');
        $response = $this->client->getResponse();

        $this->assertJson($response);
        
        $todos = json_decode($response->getContent(), true);
        /* $found = array_reduce($todos, function ($result, $item) use ($id) {
          return $result || $item['id'] === $id;
          }, false); */

        $found = false;
        foreach ($todos as $todo) {
            if ($todo['id'] === $id) {
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
        $this->request('PUT', '/api/todos/' . $id, array('title' => static::POST_BODY2, 'completed' => false));
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
        $this->request('GET', '/api/todos/' . $id);
        $response = $this->client->getResponse();

        $todo = json_decode($response->getContent(), true);
        $this->assertArrayHasKey('id', $todo);
        $this->assertArrayHasKey('title', $todo);
        $this->assertEquals($id, $todo['id']);
        $this->assertEquals(static::POST_BODY2, $todo['title']);

        return $id;
    }

    /**
     * @depends testGet
     */
    public function testDelete($id)
    {
        $this->request('DELETE', '/api/todos/' . $id);
        $response = $this->client->getResponse();

        $this->assertJson($response);
        $this->assertEquals(204, $response->getStatusCode());
    }

    /**
     * @depends testDelete
     */
    public function testCgetDeleted($id)
    {
        $this->request('GET', '/api/todos');
        $response = $this->client->getResponse();

        $this->assertJson($response);

        $todos = json_decode($response->getContent(), true);
        $found = false;
        foreach ($todos as $todo) {
            if ($todo['id'] === $id) {
                $found = true;
                break;
            }
        }

        $this->assertFalse($found);
    }

}