<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\RaceReportApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReportApiController extends Controller
{
    private RaceReportApi $apiService;

    public function __construct(RaceReportApi $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * @OA\Get(
     *     path="/v1/report",
     *     operationId="ReportAll",
     *     tags={"Report"},
     *     summary="Report Race Monaco",
     *     @OA\Parameter(
     *         name="format",
     *         in="query",
     *         description="format: json or xml",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             default="json",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Report Monaco Response"
     *     ),
     * )
     */
    public function index(Request $request): Response
    {
        if ($request->get(config('race.api.format')) === config('race.api.formatType.json')) {
            return response($this->apiService->getJson());
        }

        return response($this->apiService->getXml())
            ->header(config('race.api.contentType'), config('race.api.textXml'));
    }

}
