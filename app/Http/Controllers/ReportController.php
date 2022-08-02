<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Lib\ReportBuilderFacade;
use App\Lib\SortOrder;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show(Request $request)
    {
        $sortOrderQuery = $request->sort_order ?? "asc";
        $sortOrder = SortOrder::$sortOrderQuery()->getValue();
        $resourcesDirectory = dirname($_SERVER['DOCUMENT_ROOT']) . "/storage/resources";
        $reportBuilder = new ReportBuilderFacade();
        $report = $reportBuilder->build($resourcesDirectory, $sortOrder);

        return view('report', ['report' => $report, 'sortOrder' => $sortOrder]);
    }
}
