<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Driver;
use Illuminate\Support\Collection;

/**
 * race report for any method requires data from three files.
 */
class ReportBuilder
{
    public function __construct(private RaceTimeCalculator $raceTimeCalculatorService)
    {
    }

    /**
     * @return Collection [LSW]=>[Object]=>[[name]=>Lance Stroll [auto]=>WILLIAMS MERCEDES [time]=>1:1:13.323]
     */
    public function build(
        Collection $abbreviations,
        Collection $start,
        Collection $end,
        ?string $sort = ReportOrder::DEFAULT_ORDER
    ): Collection {
        // build an array with the data from the three files, and record the lap time
        $table = $this->createDriverCollection($abbreviations, $start, $end);
        // write position
        $table = $table->sortBy(fn(Driver $driver) => $driver->getTime());
        $i = 1;
        foreach ($table as $value) {
            $value->setPosition($i);
            $i++;
        }
        // sort user
        if ($sort !== ReportOrder::DEFAULT_ORDER) {
            $table = $table->sortByDesc(fn(Driver $driver) => $driver->getTime());
        }

        return $table;
    }

    private function createDriverCollection(Collection $abbreviations, Collection $start, Collection $end): Collection
    {
        $table = new Collection();
        foreach ($abbreviations as $key => $value) {
            $resultTime = $this->raceTimeCalculatorService->calculate($start[$key], $end[$key]);
            $driver = new Driver(
                $resultTime->getTime(),
                $value->getDriverId(),
                $value->getName(),
                $value->getAuto()
            );
            // $key = driverId
            $table->put($key, $driver);
        }

        return $table;
    }
}
