<?php declare(strict_types=1);

namespace IgniTest\Fixtures\Serializers;

use Igni\Rest\Resource;
use Igni\Rest\HypermediaLink;
use Igni\Rest\Serializer;
use Igni\Rest\Uri;
use IgniTest\Fixtures\Resources\Artist;

class ArtistSerializer implements Serializer, Resource
{
    public const URI = '/artist/{artist_id}';

    /**
     * @param Artist $artist
     * @return array
     */
    public function serialize($artist): array
    {
        return [
            'id' => $artist->getId(),
            'name' => $artist->getFirstName() . ' ' . $artist->getLastName(),

            'songs' => new HypermediaLink($this->getUri($artist) . '/songs', SongSerializer::GLOBAL_RELATION),
            'albums' => new HypermediaLink($this->getUri($artist) . '/albums', AlbumSerializer::GLOBAL_RELATION),

        ];
    }

    public function getUri(): Uri
    {
        return new Uri(self::URI, 'artist', function(Artist $artist) {
            return [
                'artist_id' => $artist->getId(),
            ];
        });
    }
}
