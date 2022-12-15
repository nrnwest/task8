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
        $str[] = '<root><0><id>1</id><position>1</position><driverId>LHM</driverId><name>Lewis Hamilton</name>';
        $str[] = '<11><id>12</id><position>12</position><driverId>RGH</driverId><name>Romain Grosjean</name>';
        $str[] = '</time></17><18><id>19</id><position>19</position><driverId>NHR</driverId><name>Nico';

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
        $valueName = 'Nico Hulkenberg';
        return [[$name, $valueName]];
    }
}
