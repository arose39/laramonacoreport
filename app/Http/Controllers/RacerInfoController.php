<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Lib\RacerInfoBuilderFacade;
use App\Lib\ReportBuilderFacade;
use App\Lib\SortOrder;
use Illuminate\Http\Request;
use \Illuminate\View\View;

class RacerInfoController extends Controller
{
    public function showAll(SortOrder $sortOrder): View
    {
        $sortOrderValue = $sortOrder->getValue();
        $resourcesDirectory = dirname($_SERVER['DOCUMENT_ROOT']) . "/storage/resources";
        $reportBuilder = new ReportBuilderFacade();
        $report = $reportBuilder->build($resourcesDirectory, $sortOrderValue);

        return view('racers', ['report' => $report, 'sortOrder' => $sortOrderValue]);
    }

    public function showOne(string $abbreviation): View
    {
        $abbreviation = strtoupper($abbreviation);
        $resourcesDirectory = dirname($_SERVER['DOCUMENT_ROOT']) . "/storage/resources";
        $racerInfoBuilder = new RacerInfoBuilderFacade();
        $racerInfo = $racerInfoBuilder->build($resourcesDirectory, $abbreviation);
        if (empty($racerInfo)) {
            abort(404);
        }

        return view('racer', ['racerInfo' => $racerInfo]);
    }
}
