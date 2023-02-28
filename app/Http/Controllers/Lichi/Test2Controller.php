<?php

namespace App\Http\Controllers\Lichi;


class Test2Controller extends BaseController
{
    public function __invoke()
    {
        $response = $this->service->test2();

        return $response;
    }
}
