<?php declare(strict_types=1);

namespace Igni\Resauce;

class HypermediaLink implements Serializable
{
    private $title;
    private $relation;
    private $uri;
    private $uriArguments = [];

    public function __construct(Uri $uri, string $relation = 'self', string $title = null)
    {
        $this->relation = $relation;
        $this->uri = $uri;
        $this->title = $title;
    }

    public function setRelation(string $relation): void
    {
        $this->relation = $relation;
    }

    public function setArguments(array $arguments): void
    {
        $this->uriArguments = $arguments;
    }

    public function toArray(): array
    {
        $href = preg_replace_callback(
            '#\{([^\}]+)\}#',
            function($matches) {
                return $this->uriArguments[$matches[1]];
            },
            $this->uri
        );

        $result = [
            'href' => $href,
            'rel' => $this->relation,
        ];

        if ($this->title) {
            $result['title'] = $this->title;
        }

        return $result;
    }
}
