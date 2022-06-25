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
        $link_exists = Link::where('link', $request->validated('link'))->first();

        if($link_exists){
            $response['link'] = $link_exists->link;
            $response['code'] = $link_exists->code;

            return response()->json($response, 208);
        }

        $new_link_created = Link::create([
            'link' => $request->validated('link'),
            'code' => Link::random_code(201),
        ]);

        $response['link'] = $new_link_created->link;
        $response['code'] = $new_link_created->code;

        return response()->json($response, 201);
    }
}
