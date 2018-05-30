<?php declare(strict_types=1);

namespace Igni\Resauce;

final class Manager
{
    /**
     * @var Serializer[]
     */
    private $serializers;

    public function addSerializer(string $type, Serializer $serializer): void
    {
        $this->serializers[$type] = $serializer;
    }

    public function getSerializerFor($object): Serializer
    {
        $type = get_class($object);
        if (!isset($this->serializers[$type])) {
            throw new \Exception('Type could not be resolved');
        }

        return $this->serializers[$type];
    }

    public function serializeObject($value, Transformer ...$transformers)
    {
        $serializer = $this->getSerializerFor($value);

        return $serializer->serialize($value);
    }

    public function serializeCollection(\Iterator $collection, Transformer ...$transformers): array
    {

    }
}
