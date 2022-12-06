<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Abbreviation;
use App\DTO\RaceTime;
use Illuminate\Support\Collection;

class ParserService
{
    private const GET_ABBREVIATIONS = '#([a-z]{3})_([a-z]+\s[^_]+)_([^\r\n]+)#iu';
    private const GET_START_END = '#([a-z]{3})([^_]+)_([0-9]{2}):([0-9]{2}):([0-9]{2}).([^\r\n]+)#iu';

    /**
     * @return Collection [DRR] => Abbreviation
     */
    public function parseAbbreviations(string $abbreviations): Collection
    {
        preg_match_all(self::GET_ABBREVIATIONS, $abbreviations, $data);
        $result = new Collection();
        foreach ($data[1] as $key => $value) {
            $result->put($value, new Abbreviation($value, $data[2][$key], $data[3][$key]));
        }

        return $result;
    }

    /**
     * @return Collection [SVF] => RaceTime
     */
    public function parseRaceTime(string $string): Collection
    {
        preg_match_all(self::GET_START_END, $string, $data);
        $result = new Collection();
        //The magic index 1 creates  preg_match_all
        foreach ($data[1] as $key => $value) {
            $result->put(
                $value,
                new RaceTime($data[2][$key], $data[3][$key], $data[4][$key], $data[5][$key], $data[6][$key])
            );
        }

        return $result;
    }
}
