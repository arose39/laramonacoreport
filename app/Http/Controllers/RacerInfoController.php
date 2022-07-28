<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Lib\RacerInfoBuilderFacade;
use App\Lib\ReportBuilderFacade;
use Illuminate\Http\Request;

class RacerInfoController extends Controller
{
    public function showAll(Request $request)
    {
        if ($request->query('sort_order') === "desc") {
            $sortOrder = "DESC";
        } else {
            $sortOrder = "ASC";
        }
        $resourcesDirectory = dirname($_SERVER['DOCUMENT_ROOT']) . "/storage/resources";
        $reportBuilder = new ReportBuilderFacade();
        $report = $reportBuilder->build($resourcesDirectory, $sortOrder);

        return view('racers', ['report' => $report, 'sortOrder' => $sortOrder]);
    }

    public function showOne(string $abbreviation)
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
