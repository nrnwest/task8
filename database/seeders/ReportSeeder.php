<?php

namespace Database\Seeders;

use App\Models\ReportModel;
use App\Services\RaceService;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(RaceService $race)
    {
        foreach ($race->getReportFile() as $driver) {
            $report = new ReportModel();
            foreach ($driver->toArray() as $k => $v) {
                $report->{$k} = $v;
            }
            $report->save();
        }
    }
}
