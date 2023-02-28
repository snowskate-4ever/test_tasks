<?php

namespace App\Http\Controllers\Lichi;


class Test4Controller extends BaseController
{
    public function __invoke()
    {
        $response = $this->service->test4();

        return $response;
    }
}
