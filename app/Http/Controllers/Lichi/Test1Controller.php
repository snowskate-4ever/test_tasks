<?php

namespace App\Http\Controllers\Lichi;


class Test1Controller extends BaseController
{
    public function __invoke()
    {
        $response = $this->service->test1();

        return $response;
    }
}
