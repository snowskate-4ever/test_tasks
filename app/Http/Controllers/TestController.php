<?php

namespace App\Http\Controllers;


class TestController extends Controller
{
    public function index()
    {
        $to  = "<mad.md@yandex.ru>";

        $subject = 'Server Order';

// текст письма
        $message = '
<html>
<head>
  <title>Заказ на сервер</title>
</head>
<body>
  <p>Конфиг:</p>
  <table>
    <tr>
      <th>Элемент</th><th></th><th>Стоимость</th>
    </tr>
    <tr>
      <td>Joe</td><td> ................. </td><td>August</td>
    </tr>
    <tr>
      <td>Joe</td><td> ................. </td><td>August</td>
    </tr>
    <tr>
      <td>Joe</td><td> ................. </td><td>August</td>
    </tr>
  </table>
</body>
</html>
';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $headers .= 'To: Customer <mad.md@yandex.ru>' . "\r\n";
        $headers .= 'From: TsSolution <tss@example.com>' . "\r\n";
        $sdsd = mail($to, $subject, $message, $headers);
        return 'результат2 '.$sdsd;
    }
}
