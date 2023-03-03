<?php


namespace App\Services\Tss;

use App\Models\People;
use App\Models\TssProduct;

class Service
{
    public function index()
    {
        $products = TssProduct::all();
        $response = null;
        foreach($products as $p) {
            $price = strlen($p['price']);
            if (strlen($p['price']) == 4 ) {
                $price = substr($p['price'], 0, 1).' '.substr($p['price'], 1, 3).' ₽';
            }
            if (strlen($p['price']) == 5 ) {
                $price = substr($p['price'], 0, 2).' '.substr($p['price'], 2, 3).' ₽';
            }
            if($p['price'] == 0) {
                $price = 'included';
            }
            $response['products'][$p['id']]['id'] = $p['id'];
            $response['products'][$p['id']]['name'] = $p['name'];
            $response['products'][$p['id']]['price'] = $p['price'];
            $response['products'][$p['id']]['price_text'] = $price;
            $response['products'][$p['id']]['tss_category_id'] = $p['tss_category_id'];
            $response['products'][$p['id']]['url'] = $p['url'];
        }
        return $response;
    }
}
