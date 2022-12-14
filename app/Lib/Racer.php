<?php declare(strict_types=1);

namespace App\Lib;

class Racer
{
    private string $abbreviation;
    private string $name;
    private string $team;
    private LapTime $lapTime;
    private const READY_LAP_TIME_LENGHT = 11;

    public function __construct(string $abbreviation, string $name, string $team, LapTime $lapTime)
    {
        $this->abbreviation = $abbreviation;
        $this->name = $name;
        $this->team = $team;
        $this->lapTime = $lapTime;
    }

    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTeam(): string
    {
        return $this->team;
    }

    public function getLapTime(): string
    {
        // Подготавливаем правильный вид для отчета
        $readyLapTime = substr($this->lapTime->getLapTime(), 1);

        //Добавляєм тройную точность милисекунд.
        if (strlen($readyLapTime) < $this::READY_LAP_TIME_LENGHT) {
            $readyLapTime = $readyLapTime . "0";
        }

        return $readyLapTime;
    }
}
