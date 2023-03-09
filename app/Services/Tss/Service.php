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
    public function sendorder($data)
    {
        $products = TssProduct::all();
        $to  = "<ilya.ilyich1105@gmail.com>";

        $subject = 'Server Order';
        foreach ($products as $product) {
            if ($product['id'] == $data['id_cpu']) {
                $response[] = $product;
            }
            if ($product['id'] == $data['id_raid']) {
                $response[] = $product;
            }
            if ($product['id'] == $data['id_lan']) {
                $response[] = $product;
            }
        }

        $sum = $response[0]['price'] + $response[1]['price'] + $response[2]['price'];

        $message = '
<html>
<head>
  <title>Заказ на сервер</title>
</head>
<body>
    <p>Здравствуйте, '.$data['fio'].'!</p>
    <p>Вы сделали заказ на серверный системный блок. Высылаем копию заказа на вашу электронную почту, '.$data['email'].'.</p>
    <p>Наши специалисты свяжутся с вами в ближайшее время по номеру, '.$data['phone'].'.</p>
  <p>Конфиг:</p>
  <table>
    <tr>
      <th>Элемент</th><th></th><th>Стоимость</th>
    </tr>
    <tr>
      <td>cpu: '.$response[0]['name'].'</td><td> ................. </td><td>'.$response[0]['price'].' ₽</td>
    </tr>
    <tr>
      <td>raid: '.$response[1]['name'].'</td><td> ................. </td><td>'.$response[1]['price'].' ₽</td>
    </tr>
    <tr>
      <td>lan: '.$response[2]['name'].'</td><td> ................. </td><td>'.$response[2]['price'].' ₽</td>
    </tr>
  </table>
  <p> Итого: '.$sum.' ₽</p>
</body>
</html>
';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $headers .= 'To: Customer <mad.md@yandex.ru>' . "\r\n";
        $headers .= 'From: TsSolution <tss@example.com>' . "\r\n";
        mail($to, $subject, $message, $headers);
        return $response;
    }
}
