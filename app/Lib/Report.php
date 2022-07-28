<?php declare(strict_types=1);

namespace App\Lib;


use App\Lib\SortStrategies\SortStrategyASC;
use App\Lib\SortStrategies\SortStrategyDESC;
use App\Lib\SortStrategies\SortStrategyInterface;
use http\Exception\InvalidArgumentException;

class Report
{
    private RacersCollection $racersCollection;
    private SortStrategyInterface $sortStrategy;

    public function __construct(RacersCollection $racersCollection)
    {
        $this->racersCollection = $racersCollection;
    }

    public function build(string $sortOrder)
    {
        $report = [];
        $i = 0;
        foreach ($this->racersCollection as $racer) {
            $report[$i]['name'] = $racer->getName();
            $report[$i]['abbreviation'] = $racer->getAbbreviation();
            $report[$i]['team'] = $racer->getTeam();
            $report[$i]['lap_time'] = $racer->getLapTime();
            $i++;
        }
        if ($sortOrder === "ASC") {
            $this->setSortStrategy(new SortStrategyASC());
        } elseif ($sortOrder === "DESC") {
            $this->setSortStrategy(new SortStrategyDESC());
        } else {
            throw new InvalidArgumentException("Incorrect argument for sorting, use 'DESC' or 'ASC'");
        }

        return $this->sortStrategy->execute($report);
    }

    private function setSortStrategy(SortStrategyInterface $sortStrategy)
    {
        $this->sortStrategy = $sortStrategy;
    }
}
