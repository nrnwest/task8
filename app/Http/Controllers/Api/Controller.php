<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

/**
 * @OA\Info(
 *     title="Laravel Swagger API documentation example",
 *     version="1.0.0",
 *     @OA\Contact(
 *         email="admin@example.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 * @OA\Tag(
 *     name="Report",
 *     description="Report Monaco",
 * )
 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url="http://localhost:5000/api"
 * )
 */
class Controller extends \App\Http\Controllers\Controller
{

}
