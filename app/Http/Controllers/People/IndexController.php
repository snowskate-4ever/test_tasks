<?php

namespace App\Http\Controllers\People;


class IndexController extends BaseController
{
    public function __invoke()
    {
        $response = $this->service->index();

        return $response;
    }
}
