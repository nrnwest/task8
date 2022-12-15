<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Driver;
use App\Models\ReportModel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

class RaceService
{

    public const DEFAULT_FIELD_SORT = 'time';

    public function __construct(
        private Config $config,
        private ReportBuilder $reportBuilder,
        private ParserService $parser,
        private FileSystem $fileSystem,
    ) {
    }

    public function getReport(?string $order = ReportOrder::DEFAULT_ORDER): Collection
    {
        return ReportModel::query()
            ->orderBy('time', $order)
            ->get();
    }

    public function getReportPaginator(
        string $order = ReportOrder::DEFAULT_ORDER,
        string $sortField = self::DEFAULT_FIELD_SORT,
        int $numberRecords = 10
    ): LengthAwarePaginator {
        return ReportModel::orderBy($sortField, $order)->paginate($numberRecords);
    }

    public function getReportFile()
    {
        $abbreviations = $this->parser->parseAbbreviations(
            $this->fileSystem->read($this->config::get('race.abbreviations'))
        );
        $start = $this->parser->parseRaceTime($this->fileSystem->read($this->config::get('race.start')));
        $end = $this->parser->parseRaceTime($this->fileSystem->read($this->config::get('race.end')));

        return $this->reportBuilder->build($abbreviations, $start, $end);
    }

    public function getDriver(string $driverId): Driver
    {
        $driver = ReportModel::where('driverId', '=', $driverId)->firstOrFail();
        $result = new Driver(
            $driver->time,
            $driver->driverId,
            $driver->name,
            $driver->auto
        );
        $result->setPosition((int)$driver->position);

        return $result;
    }
}
