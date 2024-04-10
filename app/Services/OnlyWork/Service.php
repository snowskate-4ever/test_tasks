<?php


namespace App\Services\OnlyWork;

use Illuminate\Support\Facades\Http;

class Service
{
    public function index($request)
    {

        if (empty($request->date)) {
            $response['date'] = date("d/m/Y");
            $response['date_for_form'] = date("Y-m-d");
        } else {
            $response['date_for_form'] = $request->date;
            $response['date'] = date("d/m/Y", strtotime($request->date));
        }
        $url = 'https://cbr.ru/scripts/XML_daily.asp?date_req='.$response['date'];
        $xml = simplexml_load_file($url);
        foreach ($xml->Valute as $kurs) {
            $attrs = (array) $kurs->attributes()['ID'];
            $response['kurses'][$attrs[0]] = (array) $kurs;
        }
        $date_valcurs = $xml->attributes()['Date'];
        $response['date_for_form'] = date("Y-m-d", strtotime($date_valcurs[0]));
        $response['date'] = date("d/m/Y", strtotime($date_valcurs[0]));
        //echo '<pre>'.print_r((array) $xml->attributes(), true).'</pre>';
        //dd($date);
        /*
        $file = 'request.txt';

        $current = file_get_contents($file);

        $current .= $request."\n-------------------------------------------'\n";

        file_put_contents($file, $current);
        */
        return $response;
    }
}
