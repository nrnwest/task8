<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use App\Models\Post;
use Tests\TestCase;

class ReportTest extends TestCase
{
    public function testRedirect(): void
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    public function testReport(): void
    {
        $response = $this->get('/report');
        $response->assertStatus(200);
    }

    public function testDrivers(): void
    {
        $response = $this->get('/report/drivers');
        $response->assertStatus(200);
    }

    /**
     * @dataProvider dataDriverID
     */
    public function testDriver(string $driverId): void
    {
        $response = $this->get('/report/driver/' . $driverId);
        $response->assertStatus(200);
    }

    /**
     * @dataProvider dataDriverIdError
     */
    public function testDriverError(string $driverId): void
    {
        $response = $this->get('/report/driver/' . $driverId);
        $response->assertStatus(404);
    }

    public function dataDriverId(): array
    {
        return [['SSW'], ['DRR']];
    }

    public function dataDriverIdError(): array
    {
        return [['EGT']];
    }
}
