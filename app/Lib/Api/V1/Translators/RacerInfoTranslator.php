<?php declare(strict_types=1);

namespace App\Lib\Api\V1\Translators;

class RacerInfoTranslator implements TranslatorInterface
{
    /**
     * Getted as param builded by RacerInfoBuilderFacade racer info
     */
    public function translate(array $array): array
    {
        $translatedRacerInfo = [];

            $translatedRacerInfo['abbreviation'] = $array['abbreviation'];
            $translatedRacerInfo['name'] = $array['name'];
            $translatedRacerInfo['team'] = $array['team'];
            $translatedRacerInfo['start_date'] = explode('_', $array['start_date_time'])[0];
            $translatedRacerInfo['start_time'] = explode('_', $array['start_date_time'])[1];
            $translatedRacerInfo['end_date'] = explode('_', $array['start_date_time'])[0];
            $translatedRacerInfo['end_time'] = explode('_', $array['start_date_time'])[1];
            $translatedRacerInfo['lap_time'] = $array['lap_time'];

        return $translatedRacerInfo;
    }
}
