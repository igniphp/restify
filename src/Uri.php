<?php declare(strict_types=1);

namespace Igni\Resauce;

class Uri
{
    private $path;
    private $resolver;
    private $relation;

    public function __construct(string $path, string $defaultRelation, callable $resolver = null)
    {
        $this->path = $path;
        $this->resolver = $resolver;
        $this->relation = $defaultRelation;
    }

    public function getDefaultRelation(): string
    {
        return $this->relation;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function resolve($resource = null): string
    {
        if ($resource === null) {
            return $this->path;
        }

        if ($this->resolver === null) {
            return $this->path;
        }

        return $this->fetch(($this->resolver)($resource));
    }

    protected function fetch(array $arguments): string
    {
        return preg_replace_callback(
            '#\{([^\}]+)\}#',
            function($matches) use ($arguments) {
                return $arguments[$matches[1]];
            },
            $this->getPath()
        );
    }
}
