<?php declare(strict_types=1);

namespace IgniTest\Fixtures\Serializers;

use Igni\Rest\Resource;
use Igni\Rest\HypermediaLink;
use Igni\Rest\Serializer;
use IgniTest\Fixtures\Resources\Song;

class SongSerializer implements Serializer, Resource
{
    public const GLOBAL_RELATION = 'song';

    /**
     * @param Song $song
     * @return array
     */
    public function serialize($song): array
    {
        return [
            'id' => $song->getId(),
            'title' => $song->getTitle(),
            'length' => $song->getLength(),

            'album' => HypermediaLink::href($song->getAlbum()),
            'artist' => HypermediaLink::href($song->getArtist()),
        ];
    }

    /**
     * @param Song $song
     * @return string
     */
    public function getUri($song): string
    {
        return "/artists/{$song->getArtist()->getId()}/songs/{$song->getId()}";
    }

    public function getGlobalRelation(): string
    {
        return self::GLOBAL_RELATION;
    }
}
