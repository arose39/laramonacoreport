<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportCollection;
use App\Lib\Api\V1\Converters\ConverterInterface;
use App\Lib\Api\V1\Translators\ReportTranslator;
use App\Lib\ReportBuilderFacade;
use App\Lib\SortOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\ArrayToXml\ArrayToXml;


class ReportController extends Controller
{
    public static $wrap = 'report';

    public function show(SortOrder $sortOrder, ConverterInterface $format): JsonResponse|string
    {
        $resourcesDirectory = __DIR__ . "/../../../../../storage/resources";
        $reportBuilder = new ReportBuilderFacade();
        $report = $reportBuilder->build($resourcesDirectory, $sortOrder->getValue());
        $reportTranslator = new ReportTranslator();
        $translatedReport = $reportTranslator->translate($report);

        return $format->convert($translatedReport);
    }
}
