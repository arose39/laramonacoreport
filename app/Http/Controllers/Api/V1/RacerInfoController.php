<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RacerInfoResource;
use App\Http\Resources\RacerListCollection;
use App\Lib\RacerInfoBuilderFacade;
use App\Lib\ReportBuilderFacade;
use App\Lib\SortOrder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\View\View;

class RacerInfoController extends Controller
{
    public function showAll(SortOrder $sortOrder): RacerListCollection
    {
        $resourcesDirectory = dirname($_SERVER['DOCUMENT_ROOT']) . "/storage/resources";
        $reportBuilder = new ReportBuilderFacade();
        $report = $reportBuilder->build($resourcesDirectory, $sortOrder->getValue());

        return new RacerListCollection($report);
    }

    public function showOne(string $abbreviation): RacerInfoResource
    {
        $abbreviation = strtoupper($abbreviation);
        $resourcesDirectory = dirname($_SERVER['DOCUMENT_ROOT']) . "/storage/resources";
        $racerInfoBuilder = new RacerInfoBuilderFacade();
        $racerInfo = $racerInfoBuilder->build($resourcesDirectory, $abbreviation);
        if (empty($racerInfo)) {
            abort(404);
        }

        return new RacerInfoResource($racerInfo);
    }
}
