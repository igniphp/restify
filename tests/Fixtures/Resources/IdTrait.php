<?php declare(strict_types=1);

namespace IgniTest\Fixtures\Resources;

trait IdTrait
{
    private $id;
    private static $idCache = 1;

    public function getId(): int
    {
        if ($this->id === null) {
            $this->id = self::$idCache++;
        }

        return $this->id;
    }
}
