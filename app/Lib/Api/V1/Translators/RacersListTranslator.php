<?php declare(strict_types=1);

namespace App\Lib\Api\V1\Translators;

class RacersListTranslator implements TranslatorInterface
{
    /**
     * Getted as param builded by ReportBuilderFacade report
     */
    public function translate(array $array): array
    {
        $racerList = [];
        foreach ($array as $reportItem) {
            $racerList[] = [
                'name' => $reportItem['name'],
                'abbreviation' => $reportItem['abbreviation'],
                'uri' => "/api/v1/report/racers/id=" . $reportItem['abbreviation'],
                'team' => $reportItem['team']
            ];
        }

        return $racerList;
    }
}
