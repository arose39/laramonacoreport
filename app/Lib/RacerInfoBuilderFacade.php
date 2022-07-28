<?php declare(strict_types=1);

namespace App\Lib;

use App\Lib\Parsers\AbbreviationsParser;
use App\Lib\Parsers\LogParser;

class RacerInfoBuilderFacade
{
    public function build(string $resourcesDirectory, string $abbreviation): array
    {
        $startLogPath = "$resourcesDirectory/start.log";
        $endLogPath = "$resourcesDirectory/end.log";
        $abbreviationsPath = "$resourcesDirectory/abbreviations.txt";

        $logParser = new LogParser();
        $abbreviationsParser = new AbbreviationsParser();
        $raceInfoBuilder = new RaceInfoBuilder();

        $startLog = $logParser->parse($startLogPath);
        $endLog = $logParser->parse($endLogPath);
        $racersInfo = $abbreviationsParser->parse($abbreviationsPath);
        $racersRaceInfo = $raceInfoBuilder->build($startLog, $endLog, $racersInfo);

        foreach ($racersRaceInfo as $racerRaceInfo) {
            if ($racerRaceInfo['abbreviation'] === $abbreviation) {
                $racerInfo['abbreviation'] = $racerRaceInfo['abbreviation'];
                $racerInfo['name'] = $racerRaceInfo['name'];
                $racerInfo['team'] = $racerRaceInfo['team'];
                $racerInfo['start_date_time'] = $racerRaceInfo['start_date_time'];
                $racerInfo['end_date_time'] = $racerRaceInfo['end_date_time'];
                $lapTime = new LapTime(
                    $racerRaceInfo['start_date_time'],
                    $racerRaceInfo['end_date_time']
                );
                $racerInfo['lap_time'] = $lapTime->getLapTime();

                return $racerInfo;
            }
        }
        return [];
    }
}
