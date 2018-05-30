<?php declare(strict_types=1);

namespace Igni\Resauce;

interface Serializer
{
    /**
     * @param mixed $value
     * @return array
     */
    public function serialize($value): array;
}
