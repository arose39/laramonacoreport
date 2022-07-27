<?php declare(strict_types=1);

namespace App\Lib;



class Report
{
    private RacersCollection $racersCollection;
    private SortStrategyInterface $sortStrategy;
    private FormatterInterface $formatter;

    public function __construct(RacersCollection $racersCollection, FormatterInterface $formatter)
    {
        $this->racersCollection = $racersCollection;
        $this->formatter = $formatter;
    }

    public function build(string $sortOrder)
    {
        $report = [];
        $i = 0;
        foreach ($this->racersCollection as $racer) {
            $report[$i]['name'] = $racer->getName();
            $report[$i]['team'] = $racer->getTeam();
            $report[$i]['lap_time'] = $racer->getLapTime();
            $i++;
        }
        if ($sortOrder == "ASC") {
            $this->setSortStrategy(new SortStrategyASC());
        } elseif ($sortOrder == "DESC") {
            $this->setSortStrategy(new SortStrategyDESC());
        } else {
            throw new InvalidArgumentException("Incorrect argument for sorting, use 'DESC' or 'ASC'");
        }

        return $this->sortStrategy->execute($report);
    }

    public function print(string $sortOrder = "ASC")
    {
        $report = $this->build($sortOrder);
        $this->formatter->format($report, $sortOrder);
    }

    private function setSortStrategy(SortStrategyInterface $sortStrategy)
    {
        $this->sortStrategy = $sortStrategy;
    }
}
