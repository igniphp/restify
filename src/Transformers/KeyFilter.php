<?php declare(strict_types=1);

namespace Igni\Resauce\Transformers;

use Igni\Resauce\Transformer;

class KeyFilter implements Transformer
{
    private $keys;

    public function __construct(string ...$keys)
    {
        $this->keys = array_flip($keys);
    }

    public function transform($input): array
    {
        return array_intersect_key($input, $this->keys);
    }
}
