<?php declare(strict_types=1);

namespace Igni\Resauce\Exceptions;

use Igni\Exception\RuntimeException;
use Igni\Rest\Resource;
use Igni\Rest\Serializer;

class HypermediaLinkException extends SerializerException
{
    public static function forNonHypermediaAwareSerializer(Serializer $serializer): self
    {
        return new self('Serializer ' . get_class($serializer) . ' is not implementing ' . Resource::class);
    }
}
