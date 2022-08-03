<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportCollection;
use App\Lib\ReportBuilderFacade;
use App\Lib\SortOrder;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show(SortOrder $sortOrder): ReportCollection
    {
        $resourcesDirectory = dirname($_SERVER['DOCUMENT_ROOT']) . "/storage/resources";
        $reportBuilder = new ReportBuilderFacade();
        $report = $reportBuilder->build($resourcesDirectory, $sortOrder->getValue());

        return $report;
       // return new ReportCollection($report);
    }
}
