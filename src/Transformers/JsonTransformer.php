<?php declare(strict_types=1);

namespace Igni\Resauce\Transformers;

use Igni\Resauce\Transformer;

class JsonTransformer implements Transformer
{
    public function transform($input): \JsonSerializable
    {
        return new class($input) implements \JsonSerializable, \ArrayAccess
        {
            private $data;

            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function offsetExists($offset): bool
            {
                return isset($this->data[$offset]);
            }

            public function offsetGet($offset)
            {
                return $this->data[$offset];
            }

            public function offsetSet($offset, $value): void
            {
                $this->data[$offset] = $value;
            }

            public function offsetUnset($offset): void
            {
                unset($this->data[$offset]);
            }

            public function jsonSerialize(): array
            {
                return $this->data;
            }
        };
    }
}
