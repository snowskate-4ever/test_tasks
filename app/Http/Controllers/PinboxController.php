<?php

namespace App\Http\Controllers;

class PinboxController extends Controller
{
    public function pinbox()
    {
        $str_arr = [
            'пн-ср с 9.00 до 20.00',
            'вт с 10:00 до 20:00',
            'пн-вс с 10.20 до 20.00, перерыв с 12:00 до 13.00'
        ];
        $week = ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'];
        $ww = null; $wt = null;
        echo "
            Исходные данные(Массив строк):<br>
            <pre>".print_r($str_arr, true)."</pre>";
        foreach($str_arr as $key => $str) {                 // перебираем строки
            $tmp_str = str_replace(".", ":", $str);
            $wt_start = (strpos(mb_substr($tmp_str ,mb_stripos($tmp_str, ' с ') + 3, 5), ':') === 2) ? mb_substr($tmp_str ,mb_stripos($tmp_str, ' с ') + 3, 5) : $str = '0'.mb_substr($tmp_str ,mb_stripos($tmp_str, ' с ') + 3, 5);
            $wt_end   = (strpos(mb_substr($tmp_str ,mb_stripos($tmp_str, 'до ') + 3, 5), ':') === 2) ? mb_substr($tmp_str ,mb_stripos($tmp_str, 'до ') + 3, 5) : $str = '0'.mb_substr($tmp_str ,mb_stripos($tmp_str, 'до ') + 3, 5);
            $day_start = mb_substr($tmp_str, 0, 2);
            $day_end   = (mb_stripos($tmp_str, ' с ') === 2) ? mb_substr($tmp_str, 0, 2) :mb_substr($tmp_str, 3, 2);
            $is_break = strpos($tmp_str, 'перерыв');
            $tmp = explode('перерыв', $tmp_str);
            $k = 0;

            if ($is_break !== false) {
                $ww_start   = (strpos(mb_substr($tmp[1] ,mb_stripos($tmp[1], ' с ') + 3, 5), ':') === 2) ? mb_substr($tmp[1] ,mb_stripos($tmp[1], ' с ') + 3, 5) : $str = '0'.mb_substr($tmp[1] ,mb_stripos($tmp[1], ' с ') + 3, 5);
                $ww_end     = (strpos(mb_substr($tmp[1] ,mb_stripos($tmp[1], 'до ') + 3, 5), ':') === 2) ? mb_substr($tmp[1] ,mb_stripos($tmp[1], 'до ') + 3, 5) : $str = '0'.mb_substr($tmp[1] ,mb_stripos($tmp[1], 'до ') + 3, 5);
            }

            foreach ($week as $day) {
                if ( $day == $day_start ){
                    $k = 1;
                }
                if ($k == 1) {
                    $wt[$key][$day] = [
                        'begin' => $wt_start,
                        'end' => $wt_end
                    ];
                }
                if ($is_break !== false) {
                    $ww[$key][mb_substr($tmp_str, 0, 2)] = [
                        'begin' => $ww_start,
                        'end' => $ww_end
                    ];
                }
                if ( $day == $day_end ){
                    $k = 0;
                }
            }
        }
        echo "
            /--------------------/ WT /--------------------/
            <pre>".print_r($wt, true)."</pre>
            /--------------------/ WW /--------------------/
            <pre>".print_r($ww, true)."</pre>";
    }
}
