<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\RaceService;
use App\Services\ReportOrder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    private RaceService $raceService;
    private ReportOrder $reportOrder;

    public function __construct(RaceService $raceService, ReportOrder $reportOrder)
    {
        $this->raceService = $raceService;
        $this->reportOrder = $reportOrder;
    }

    public function index(Request $request): View
    {
        $order = $request->get(ReportOrder::KEY_ORDER);
        return view(
            'report',
            [
                ReportOrder::KEY_ORDER => $this->reportOrder->getOrderTemplate($order),
                'report' => $this->raceService->getReport($this->reportOrder->getOrder($order))
            ]
        );
    }

    public function drivers(Request $request): View
    {
        $order = $request->get(ReportOrder::KEY_ORDER);
        return view(
            'drivers',
            [
                ReportOrder::KEY_ORDER => $this->reportOrder->getOrderTemplate($order),
                'report' => $this->raceService->getReport($this->reportOrder->getOrder($order))
            ]
        );
    }

    public function driver(string $driverId): View
    {
        return view(
            'driver',
            [
                'driverId' => $driverId,
                'driver' => $this->raceService->getDriver($driverId)
            ]
        );
    }
}
