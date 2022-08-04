<?php declare(strict_types=1);

namespace App\Lib\Api\V1\Translators;

class ReportTranslator implements TranslatorInterface
{

    /**
     * Getted as param builded by ReportBuilderFacade report
     */
    public function translate(array $array): array
    {
        $i = 0;
        $translatedReport = [];
        foreach ($array as $reportItem) {
            $translatedReport[$i]['name'] = $reportItem['name'];
            $translatedReport[$i]['team'] = $reportItem['team'];
            $translatedReport[$i]['lap_time'] = $reportItem['lap_time'];
            $i++;
        }

        return $translatedReport;
    }
}
