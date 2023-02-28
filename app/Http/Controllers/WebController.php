<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $str_arr = [
            'пн-ср с 9.00 до 20.00',
            'вт с 10:00 до 20:00',
            'пн-вс с 10.20 до 20.00, перерыв с 12:00 до 13.00'
        ];
        print_r('Исходные данные(Массив строк):<br>');
        foreach($str_arr as $key => $str) {
            print_r($str);
            print_r('<br>');
            $str_arr[$key] = str_replace(".", ":", $str);
        }
        print_r('<br>');
        $week = ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'];
        foreach($str_arr as $key => $str) {                 // перебираем строки
            $tmp = explode(', ', $str);             // разбиваем всю строку по запятой
            $tmp1 = explode(' с ', $tmp[0]);        // разбиваем первую подстроку на дни работы и время
            $tmp2 = explode('-', $tmp1[0]);         // разбиваем дни недели
            $tmp3 = explode(' до ', $tmp1[1]);      // разбиваем время
            $first_day = $tmp2[0];                          // первый день работы
            if (isset($tmp2[1])) {
                $last_day = $tmp2[0];                       // второй день работы, если есть
            }
            if (isset($tmp[1])) {
                $tmp4 = explode(' с ', $tmp[1]);    // получаем время перерыва, если есть
                $tmp5 = explode(' до ', $tmp4[1]);  // разбиваем время перерыва, если есть
                $break_begin = $tmp5[0];                    // начало перерыва
                $break_end = $tmp5[1];                      // окончание перерыва
            }
            foreach ($tmp3 as $t) {
                if (strlen($t) == 4) {
                    $tmp3[0] = '0' . $tmp3[0];
                }
            }
            if(count($tmp2) == 2) {
                $tmp2 = explode('-', $tmp1[0]);
                $k = 0;
                foreach($week as $day) {
                    if($day === $tmp2[0]){
                        $w[$key][$day]['begin'] = $tmp3[0];
                        $w[$key][$day]['end'] = $tmp3[1];
                        if(isset($tmp[1])){
                            $w[$key][$day]['break_begin'] = $break_begin;
                            $w[$key][$day]['break_end'] = $break_end;
                        }
                        $k = 1;
                    }
                    if($k === 1){
                        $w[$key][$day]['begin'] = $tmp3[0];
                        $w[$key][$day]['end'] = $tmp3[1];
                        if(isset($tmp[1])){
                            $w[$key][$day]['break_begin'] = $break_begin;
                            $w[$key][$day]['break_end'] = $break_end;
                        }
                        $k = 1;
                    }
                    if($day === $tmp2[1]){
                        $w[$key][$day]['begin'] = [0];
                        $w[$key][$day]['end'] = $tmp3[1];
                        if(isset($tmp[1])){
                            $w[$key][$day]['break_begin'] = $break_begin;
                            $w[$key][$day]['break_end'] = $break_end;
                        }
                        $k = 2;
                    }
                }
            }
            if(count($tmp2) == 1) {
                foreach($week as $day) {
                    if ($day === $tmp2[0]) {
                        $w[$key][$day]['begin'] = $tmp3[0];
                        $w[$key][$day]['end'] = $tmp3[1];
                        if(isset($tmp[1])){
                            $w[$key][$day]['break_begin'] = $break_begin;
                            $w[$key][$day]['break_end'] = $break_end;
                        }
                    }
                }
            }
        }
        foreach($w as $arr){
            print_r($arr);
            print_r('<br>');
        }
    }
}
