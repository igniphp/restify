<?php declare(strict_types=1);

namespace Igni\Resauce;

interface Resource extends Serializer
{
    public function getUri(): Uri;
}
