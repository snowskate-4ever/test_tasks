<?php

namespace App\Http\Controllers\People;

use App\Http\Requests\People\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $response = $this->service->store($data);

        return $response;
    }
}
