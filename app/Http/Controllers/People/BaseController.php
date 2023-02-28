<?php


namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Services\People\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
