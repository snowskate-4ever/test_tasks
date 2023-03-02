<?php

namespace App\Http\Controllers;


class TssController extends BaseController
{
    public function index()
    {
        $response = $this->service->index();

        return $response;
    }
}
