<?php declare(strict_types=1);

namespace App\Lib\Formatters;

interface FormatterInterface
{
    public function format(array $report, string $sortOrder): void;
}
