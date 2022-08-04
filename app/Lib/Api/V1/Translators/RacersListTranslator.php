<?php declare(strict_types=1);

namespace App\Lib\Api\V1\Translators;

class RacersListTranslator implements TranslatorInterface
{
    /**
     * Getted as param builded by ReportBuilderFacade report
     */
    public function translate(array $array): array
    {
        $i = 0;
        $racerList = [];
        foreach ($array as $reportItem) {
            $racerList[$i]['name'] = $reportItem['name'];
            $racerList[$i]['abbreviation'] = $reportItem['abbreviation'];
            $racerList[$i]['uri'] = "/api/v1/report/racers/id=" . $reportItem['abbreviation'];
            $racerList[$i]['team'] = $reportItem['team'];
            $i++;
        }

        return $racerList;
    }
}
