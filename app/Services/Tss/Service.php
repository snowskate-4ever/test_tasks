<?php


namespace App\Services\Tss;

use App\Models\People;

class Service
{
    public function index()
    {
        $people = People::all();
        $response = null;
        $response['people_count'] = count($people);
        $response['people_sum_age'] = null;
        foreach($people as $p) {
            $response['people'][$p['id']]['name'] = $p['name'];
            $response['people'][$p['id']]['age'] = $p['age'];
            $response['people_sum_age'] = $response['people_sum_age'] + $p['age'];
        }
        return $response;
    }
    public function store($data)
    {
        People::create($data);
        $people = People::all();
        $response = null;
        $response['people_count'] = count($people);
        $response['people_sum_age'] = null;
        foreach($people as $p) {
            $response['people'][$p['id']]['name'] = $p['name'];
            $response['people'][$p['id']]['age'] = $p['age'];
            $response['people_sum_age'] = $response['people_sum_age'] + $p['age'];
        }
        return $response;
    }
}
