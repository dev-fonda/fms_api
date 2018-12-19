<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Swagger\Annotations as SWG;

/**
 * @OA\Info(
 *     description="FMS API",
 *     version="1.0.0",
 *     title="FMS API",
 *     termsOfService="http://swagger.io/terms/",
 *     @OA\Contact(
 *         email="info@demo.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
/**
 * @OA\Tag(
 *     name="FMS API",
 *     description="",
 * )
 * @OA\Server(
 *     description="SwaggerHUB API Mocking",
 *     url="http://localhost/fms_api/"
 * )
 */
/**
 * @SWG\SecurityScheme(
 *   securityDefinition="MyHeaderAuthentication",
 *   type="apiKey",
 *   in="header",
 *   name="Authorization"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
