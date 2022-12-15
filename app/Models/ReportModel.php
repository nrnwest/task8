<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
    use HasFactory;

    protected $table = 'reports';

    public $timestamps = false;

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAuto(): string
    {
        return $this->auto;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getDriverId(): string
    {
        return $this->driverId;
    }

}
