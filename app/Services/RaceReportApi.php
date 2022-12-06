<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;
use SimpleXMLElement;

class RaceReportApi
{
    public function __construct(private RaceService $raceService)
    {
    }

    public function getJson(): Collection
    {
        return $this->raceService->getReport();
    }

    public function getXml(): string
    {
        $xml = new SimpleXMLElement(config('race.api.xmlHeader'));
        $this->dataToXml($this->raceService->getReport(), $xml);
        return $xml->asXML();
    }

    private function dataToXml(Collection $reportRace, SimpleXMLElement $xml): void
    {
        foreach ($reportRace as $idDriver => $driver) {
            $label = $xml->addChild((string)$idDriver);
            foreach ($driver->toArray() as $field => $value) {
                $label->addChild($field, (string)$value);
            }
        }
    }
}
