<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Lib\ReportBuilderFacade;
use App\Lib\SortOrder;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show(SortOrder $sortOrder)
    {
        $sortOrderValue = $sortOrder->getValue();
        $resourcesDirectory = dirname($_SERVER['DOCUMENT_ROOT']) . "/storage/resources";
        $reportBuilder = new ReportBuilderFacade();
        $report = $reportBuilder->build($resourcesDirectory, $sortOrderValue);

        return view('report', ['report' => $report, 'sortOrder' => $sortOrderValue]);
    }
}
