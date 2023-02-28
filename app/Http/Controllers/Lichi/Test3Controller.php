<?php

namespace App\Http\Controllers\Lichi;


class Test3Controller extends BaseController
{
    public function __invoke()
    {
        $response = $this->service->test3();

        return $response;
    }
}
