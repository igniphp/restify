<?php declare(strict_types=1);

namespace Igni\Resauce;

interface Serializable
{
    public function toArray(): array;
}
