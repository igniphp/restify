<?php declare(strict_types=1);

namespace IgniTest\Fixtures\Resources;

use DateTimeInterface;

class Album
{
    use IdTrait;

    private $title;
    private $price = 0.0;
    private $releaseDate;
    private $cover;
    private $artist;
    private $songs = [];

    public function __construct(string $title, Artist $artist, DateTimeInterface $releaseDate)
    {
        $this->title = $title;
        $this->artist = $artist;
        $this->releaseDate = $releaseDate;
    }

    public function getArtist(): Artist
    {
        return $this->artist;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSongs(): array
    {
        return $this->songs;
    }

    public function addSong(Song $song): void
    {
        $this->songs[] = $song;
    }

    public function setCover(string $imageUrl): void
    {
        $this->cover = $imageUrl;
    }

    public function getCover(): string
    {
        return $this->cover;
    }

    public function getReleaseDate(): DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
