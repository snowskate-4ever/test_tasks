<?php

namespace App\Http\Controllers\Lichi;


use App\Http\Requests\Lichi\IndexRequest;
use App\Models\Group;

class Test41Controller extends BaseController
{
    public function __invoke(IndexRequest $request)
    {
        //$data = $request;

        $response = $this->service->test41($request['id']);
        //$response = $request['id'];
        return $response;
    }
}
