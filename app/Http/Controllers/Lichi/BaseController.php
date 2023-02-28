<?php


namespace App\Http\Controllers\Lichi;

use App\Http\Controllers\Controller;
use App\Services\Lichi\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
