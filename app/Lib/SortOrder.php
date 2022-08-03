<?php declare(strict_types=1);

namespace App\Lib;

class SortOrder
{
    private const ASC = 'ASC';
    private const DESC = 'DESC';

    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function asc(): self
    {
        return new self(self::ASC);
    }

    public static function desc(): self
    {
        return new self(self::DESC);
    }

    public static function __callStatic(string $name, mixed $arguments): self
    {
        return self::asc();
    }
}
