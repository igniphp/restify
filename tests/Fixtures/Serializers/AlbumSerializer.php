<?php declare(strict_types=1);

namespace IgniTest\Fixtures\Serializers;

use Igni\Rest\Resource;
use Igni\Rest\HypermediaLink;
use Igni\Rest\Manager;
use Igni\Rest\Serializer;
use Igni\Rest\Transformers\JsonTransformer;
use Igni\Rest\Transformers\KeyFilter;
use Igni\Rest\Uri;
use IgniTest\Fixtures\Resources\Album;

class AlbumSerializer implements Serializer, Resource
{
    public const URI_PATH = '/artist/{artist_id}/albums/{album_id}';

    /**
     * @param Album $album
     * @return array
     */
    public function serialize($album): array
    {
        return [
            'id' => $album->getId(),
            'title' => $album->getTitle(),
            'release_date' => $album->getReleaseDate()->format('Ymd'),
            'cover_image' => $album->getCover(),
            'artist' => $album->getArtist(),
            'songs' => new HypermediaLink(
                new Uri(self::URI_PATH . '/songs', 'song', function(Album $album) {
                    return [
                        'artist_id' => $album->getArtist()->getId(),
                        'album_id' => $album->getId(),
                    ];
                })
            ),
        ];
    }

    public function getUri(): Uri
    {
        return new Uri(self::URI_PATH, 'album', function(Album $album) {
            return [
                'artist_id' => $album->getArtist()->getId(),
                'album_id' => $album->getId(),
            ];
        });
    }
}


$manager = new Manager();
$manager->serializeCollection($colection, new KeyFilter('title', 'name'));
$manager->serializeObject($author, new JsonTransformer());
