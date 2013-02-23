<?php

namespace Dunglas\TodoMVCBundle\Decoder;

use FOS\Rest\Decoder\DecoderInterface;

/**
 * Decodes JSON data and make it compliant with  style
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class JsonToFormDecoder implements DecoderInterface
{

    /**
     * Makes data decoded from JSON application/x-www-form-encoded compliant
     *
     * @param array $data
     */
    private function xWwwFormEncodedLike(&$data)
    {
        foreach ($data as $key => &$value) {
            if (is_array($value)) {
                // Encode recursively
                $this->xWwwFormEncodedLike($value);
            } elseif (false === $value) {
                // Checkbox-like behavior: remove false data
                unset($data[$key]);
            } elseif (!is_string($value)) {
                // Convert everyting to string
                // true values will be converted to '1', this is the default checkbox behavior
                $value = strval($value);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function decode($data)
    {
        $decodedData = @json_decode($data, true);
        if ($decodedData) {
            $this->xWwwFormEncodedLike($decodedData);
        }

        return $decodedData;
    }

}
