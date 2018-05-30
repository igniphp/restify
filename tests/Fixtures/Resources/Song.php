<?php declare(strict_types=1);

namespace IgniTest\Fixtures\Resources;

class Song
{
    use IdTrait;
    
    private $album;
    private $artist;
    private $title;
    private $length;

    public function __construct(Album $album, Artist $artist, string $title)
    {
        $this->album = $album;
        $this->artist = $artist;
        $this->title = $title;
    }

    public function setLength(int $seconds): void
    {
        $this->length = $seconds;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getAlbum(): Album
    {
        return $this->album;
    }

    public function getArtist(): Artist
    {
        return $this->artist;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
