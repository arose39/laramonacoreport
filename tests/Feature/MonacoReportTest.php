<?php

namespace Tests\Feature;

use App\Lib\RacerInfoBuilderFacade;
use App\Lib\ReportBuilderFacade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MonacoReportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testReportSortsOrderIsWorking()
    {
        $resourcesDirectory = __DIR__ . "/../../storage/resources";
        $reportBuilder = new ReportBuilderFacade();
        $reportAscOrder = $reportBuilder->build($resourcesDirectory, 'ASC');
        $reportDescOrder = $reportBuilder->build($resourcesDirectory, 'DESC');
        $this->assertTrue($reportAscOrder[0]['lap_time'] < $reportAscOrder[1]['lap_time']);
        $this->assertTrue($reportDescOrder[0]['lap_time'] > $reportDescOrder[1]['lap_time']);
    }

    public function testRacerInfoBuilderIsWorking()
    {
        $resourcesDirectory = __DIR__ . "/../../storage/resources";
        $abbreviation = 'SVF';
        $racerInfoBuilder = new RacerInfoBuilderFacade();
        $racerInfo = $racerInfoBuilder->build($resourcesDirectory, $abbreviation);
        $expectedName = 'Sebastian Vettel';
        $this->assertEquals($expectedName, $racerInfo['name']);
    }
}
