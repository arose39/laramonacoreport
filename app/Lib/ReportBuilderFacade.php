<?php


namespace App\Lib;

use App\Lib\Formatters\HtmlFormatter;
use App\Lib\Parsers\AbbreviationsParser;
use App\Lib\Parsers\LogParser;
use App\Lib\LapTime;
use App\Lib\RaceInfoBuilder;
use App\Lib\Racer;
use App\Lib\RacersCollection;
use App\Lib\Report;

class RacersListBuilderFacade
{



$startLogPath = 'resources/start.log';
$endLogPath = 'resources/end.log';
$abbreviationsPath = 'resources/abbreviations.txt';

$logParser = new LogParser();
$abbreviationsParser = new AbbreviationsParser();
$raceInfoBuilder = new RaceInfoBuilder();
$racersCollection = new RacersCollection();

$startLog = $logParser->parse($startLogPath);
$endLog = $logParser->parse($endLogPath);
$racersInfo = $abbreviationsParser->parse($abbreviationsPath);
$racersRaceInfo = $raceInfoBuilder->build($startLog, $endLog, $racersInfo);

foreach ($racersRaceInfo as $racerRaceInfo) {
$racersCollection->add(
new Racer(
$racerRaceInfo['abbreviation'],
$racerRaceInfo['name'],
$racerRaceInfo['team'],
new LapTime($racerRaceInfo['start_date_time'], $racerRaceInfo['end_date_time'])
)
);
}
$formatter = new HtmlFormatter();
$report = new Report($racersCollection, $formatter);
$report->print();


}
