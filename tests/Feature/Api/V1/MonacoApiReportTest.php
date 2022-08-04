<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MonacoApiReportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testJsonFormattedResponsesWithoutFormatParam()
    {
        $reportResponse = $this->get('/api/v1/report');
        $reportResponse->assertStatus(200);
        $reportResponse->assertHeader("Content-Type", 'application/json');

        $racersListResponse = $this->get('/api/v1/report/racers');
        $racersListResponse->assertStatus(200);
        $racersListResponse->assertHeader("Content-Type", 'application/json');

        $racerInfoResponse = $this->get('/api/v1/report/racers/id=SVF');
        $racerInfoResponse->assertStatus(200);
        $racerInfoResponse->assertHeader("Content-Type", 'application/json');
    }

    public function testJsonFormattedResponsesWithFormatParam()
    {
        $reportResponse = $this->get('/api/v1/report?format=json');
        $reportResponse->assertStatus(200);
        $reportResponse->assertHeader("Content-Type", 'application/json');

        $racersListResponse = $this->get('/api/v1/report/racers?format=json');
        $racersListResponse->assertStatus(200);
        $racersListResponse->assertHeader("Content-Type", 'application/json');

        $racerInfoResponse = $this->get('/api/v1/report/racers/id=SVF?format=json');
        $racerInfoResponse->assertStatus(200);
        $racerInfoResponse->assertHeader("Content-Type", 'application/json');
    }

    public function testXmlFormattedResponses()
    {
        $reportResponse = $this->get('/api/v1/report?format=xml');
        $reportResponse->assertStatus(200);
        $xmlString = '<?xml version="1.0"?>';
        $reportResponseBody = $reportResponse->original;
        $this->assertStringStartsWith($xmlString, $reportResponseBody);

        $racersListResponse = $this->get('/api/v1/report?format=xml');
        $racersListResponse->assertStatus(200);
        $xmlString = '<?xml version="1.0"?>';
        $racersListResponseBody = $racersListResponse->original;
        $this->assertStringStartsWith($xmlString, $racersListResponseBody);

        $racerInfoResponse = $this->get('/api/v1/report?format=xml');
        $racerInfoResponse->assertStatus(200);
        $xmlString = '<?xml version="1.0"?>';
        $racerInfoResponseBody = $racerInfoResponse->original;
        $this->assertStringStartsWith($xmlString, $racerInfoResponseBody);
    }

    public function testJsonFormattedRacerInfoResponseDataCorrect()
    {
        $racerInfoResponse = $this->get('/api/v1/report/racers/id=SVF');
        $racerInfoResponse->assertJsonStructure([
            "abbreviation",
            "name",
            "team",
            "start_date",
            "start_time",
            "end_date",
            "end_time",
            "lap_time"]);
    }

    public function testJsonFormattedReportResponseDataCorrect()
    {
        $reportResponse = $this->get('/api/v1/report');
        $reportResponse->assertJsonStructure([
            0 => [
                "name",
                "team",
                "lap_time"
            ]
        ]);
    }

    public function testJsonFormattedRacersListResponseDataCorrect()
    {
        $racersListResponse = $this->get('/api/v1/report/racers');
        $racersListResponse->assertJsonStructure([
            0 => [
                "name",
                "abbreviation",
                "uri",
                "team"
            ]
        ]);
    }

    public function testXmlFormattedRacerInfoResponseDataCorrect()
    {
        $racerInfoResponse = $this->get('/api/v1/report/racers/id=SVF?format=xml');
        $racerInfoResponseBody = $racerInfoResponse->original;
        $this->assertStringContainsString('<abbreviation>', $racerInfoResponseBody);
        $this->assertStringContainsString('<name>', $racerInfoResponseBody);
        $this->assertStringContainsString('<team>', $racerInfoResponseBody);
        $this->assertStringContainsString('<start_date>', $racerInfoResponseBody);
        $this->assertStringContainsString('<start_time>', $racerInfoResponseBody);
        $this->assertStringContainsString('<end_date>', $racerInfoResponseBody);
        $this->assertStringContainsString('<end_time>', $racerInfoResponseBody);
        $this->assertStringContainsString('<lap_time>', $racerInfoResponseBody);
    }

    public function testXmlFormattedReportResponseDataCorrect()
    {
        $reportResponse = $this->get('/api/v1/report?format=xml');
        $reportResponseBody = $reportResponse->original;
        $this->assertStringContainsString('<racer>', $reportResponseBody);
        $this->assertStringContainsString('<name>', $reportResponseBody);
        $this->assertStringContainsString('<lap_time>', $reportResponseBody);
    }

    public function testXmlFormattedRacersListResponseDataCorrect()
    {
        $racersListResponse = $this->get('/api/v1/report/racers?format=xml');
        $racersListResponseBody = $racersListResponse->original;
        $this->assertStringContainsString('<name>', $racersListResponseBody);
        $this->assertStringContainsString('<abbreviation>', $racersListResponseBody);
        $this->assertStringContainsString('<uri>', $racersListResponseBody);
        $this->assertStringContainsString('<team>', $racersListResponseBody);
    }
}
