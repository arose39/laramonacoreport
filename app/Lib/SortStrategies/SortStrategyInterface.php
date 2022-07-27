<?php declare(strict_types=1);

namespace App\Lib\SortStrategies;

interface SortStrategyInterface
{
    public function execute(array $report): array;
}
