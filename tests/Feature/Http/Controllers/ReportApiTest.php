<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use App\Models\Post;
use Tests\TestCase;

class ReportApiTest extends TestCase
{
    /**
     * @dataProvider dataStrXml
     */
    public function testApiReportXml($str): void
    {
        $response = $this->get('/api/v1/report?format=xml');
        $response->assertStatus(200);
        $response->assertSeeInOrder($str, false);
    }

    public function dataStrXml(): array
    {
        $str[] = '<driverId>LHM</driverId><name>Lewis Hamilton</name><auto>MERCEDES</auto><microTime>';
        $str[] = '<auto>MCLAREN RENAULT</auto><microTime>3672.999657</microTime><time>1:1:12.657</time>';
        $str[] = '<position>19</position><driverId>BHS</driverId><name>Brendon Hartley</name>';

        return [[$str]];
    }

    /**
     * @dataProvider dataValueJson
     */
    public function testApiReportJson($name, $valueName): void
    {
        $response = $this->get('/api/v1/report?format=json');
       $response->assertStatus(200);
       $response->assertJsonPath($name, $valueName);
    }

    public function dataValueJson()
    {
        $name = '18.name';
        $valueName = 'Brendon Hartley';
        return [[$name, $valueName]];
    }
}
