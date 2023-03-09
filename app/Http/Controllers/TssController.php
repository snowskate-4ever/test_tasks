<?php

namespace App\Http\Controllers;


use App\Http\Requests\Tss\SendRequest;

class TssController extends BaseController
{
    public function index()
    {
        $response = $this->service->index();

        return $response;
    }
    public function sendorder(SendRequest $request)
    {
        $data = $request->validated();

        $response = $this->service->sendorder($data);

        return $response;
    }
}
