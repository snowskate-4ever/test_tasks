<?php

namespace App\Http\Controllers\OnlyWork;

use App\Http\Requests\OnlyWork\OnlyWork;
class OnlyWorkController extends BaseController
{
    public function index(OnlyWork $request)
    {
        $response = $this->service->index($request);
        //echo '<pre>'.print_r($response, true).'</pre>';
        return view('onlywork', $response);
    }
}
