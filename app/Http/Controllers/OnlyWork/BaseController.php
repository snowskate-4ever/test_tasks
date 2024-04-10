<?php


namespace App\Http\Controllers\OnlyWork;

use App\Http\Controllers\Controller;
use App\Services\OnlyWork\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
