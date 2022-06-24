<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ShortLinkFormRequest;
use App\Models\Link;
use Illuminate\Http\Request;

class ShortLinkGeneratorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ShortLinkFormRequest $request)
    {
        $response = Link::created($request->validated());

        return response()->json($response);
    }
}
