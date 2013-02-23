<?php

namespace Dunglas\TodoMVCBundle\Tests\Decoder;

use Dunglas\TodoMVCBundle\Decoder\JsonToFormDecoder;

/**
 * Tests the form like encoder
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class JsonToFormDecoderTest extends \PHPUnit_Framework_TestCase
{

    public function testDecode()
    {
        $data = array(
            'arrayKey' => array(
                'falseKey' => false,
                'stringKey' => 'foo'
            ),
            'falseKey' => false,
            'trueKey' => true,
            'intKey' => 69,
            'floatKey' => 3.14,
            'stringKey' => 'bar',
        );
        $decoder = new JsonToFormDecoder();
        $decoded = $decoder->decode(json_encode($data));

        $this->assertTrue(is_array($decoded));
        $this->assertTrue(is_array($decoded['arrayKey']));
        $this->assertArrayNotHasKey('falseKey', $decoded['arrayKey']);
        $this->assertEquals('foo', $decoded['arrayKey']['stringKey']);
        $this->assertArrayNotHasKey('falseKey', $decoded);
        $this->assertEquals('1', $decoded['trueKey']);
        $this->assertEquals('69', $decoded['intKey']);
        $this->assertEquals('3.14', $decoded['floatKey']);
        $this->assertEquals('bar', $decoded['stringKey']);
    }

}
