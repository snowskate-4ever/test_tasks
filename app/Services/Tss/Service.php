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
            $price = $p['price'].' ₽';
            if (strlen($price) == 6 ) {
                $price = substr_replace($price, ' ', 2, 0);
            }
            if (strlen($price) == 7 ) {
                $price = substr_replace($price, ' ', 3, 0);
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
            $response['products'][$p['id']]['checked'] = 'false';
            $response['products'][$p['id']]['checked'] = 'false';
        }
        return $response;
    }
}
