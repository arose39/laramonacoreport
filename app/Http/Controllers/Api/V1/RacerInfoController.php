<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RacerInfoResource;
use App\Http\Resources\RacerListCollection;
use App\Lib\Api\V1\Converters\ConverterInterface;
use App\Lib\Api\V1\Translators\RacerInfoTranslator;
use App\Lib\Api\V1\Translators\RacersListTranslator;
use App\Lib\RacerInfoBuilderFacade;
use App\Lib\ReportBuilderFacade;
use App\Lib\SortOrder;
use Illuminate\Http\JsonResponse;

class RacerInfoController extends Controller
{
    public function showAll(SortOrder $sortOrder, ConverterInterface $format): JsonResponse|string
    {
        $resourcesDirectory = __DIR__ . "/../../../../../storage/resources";
        $reportBuilder = new ReportBuilderFacade();
        $report = $reportBuilder->build($resourcesDirectory, $sortOrder->getValue());
        $racersListTranslator = new RacersListTranslator();
        $translatedRacersList = $racersListTranslator->translate($report);

        return $format->convert($translatedRacersList);
    }

    public function showOne(string $abbreviation, ConverterInterface $format): JsonResponse|string
    {
        $abbreviation = strtoupper($abbreviation);
        $resourcesDirectory = __DIR__ . "/../../../../../storage/resources";
        $racerInfoBuilder = new RacerInfoBuilderFacade();
        $racerInfo = $racerInfoBuilder->build($resourcesDirectory, $abbreviation);
        if (empty($racerInfo)) {
            abort(404);
        }
        $racerInfoTranslator = new RacerInfoTranslator();
        $translatedRacerInfo = $racerInfoTranslator->translate($racerInfo);

        return $format->convert($translatedRacerInfo);
    }
}
