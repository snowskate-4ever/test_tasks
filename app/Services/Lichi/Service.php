<?php


namespace App\Services\Lichi;


use App\Models\Group;
use App\Models\Product;
use App\Models\Test;

class Service
{
    public function test1()
    {
        $arr = [
            [399, 9160, 144, 3230, 407, 8875, 1597, 9835],
            [2093, 3279, 21, 9038, 918, 9238, 2592, 7467],
            [3531, 1597, 3225, 153, 9970, 2937, 8, 807],
            [7010, 662, 6005, 4181, 3, 4606, 5, 3980],
            [6367, 2098, 89, 13, 337, 9196, 9950, 5424],
            [7204, 9393, 7149, 8, 89, 6765, 8579, 55],
            [1597, 4360, 8625, 34, 4409, 8034, 2584, 2],
            [920, 3172, 2400, 2326, 3413, 4756, 6453, 8],
            [4914, 21, 4923, 4012, 7960, 2254, 4448, 1]
        ];
        $fib_current = 0;
        $fib_next = 1;
        $k = 0;
        $max = 0;
        foreach($arr as $i=>$item){
            foreach($item as $j=>$a){
                if ($a >  $max) { $max = $a;}
                $response['arr'][$i][$j]['value'] = $a;
                $response['arr'][$i][$j]['chek'] = 0;
            }
        }
        while ($fib_current <= $max) {
            $response['fib'][$k] = $fib_current;
            foreach($arr as $i=>$item){
                foreach($item as $j=>$a){
                    if ($fib_current == $a) {
                        $response['arr'][$i][$j]['chek'] = 1;
                    }
                }
            }
            $tmp = $fib_next;
            $fib_next = $fib_next + $fib_current;
            $fib_current = $tmp;
            $k++;
        }
        return $response;
    }
    public function test2()
    {
        $arr = null;
        $response = null;
        $condition = [ '012', '123', '234', '345', '456', '567', '678', '789', '890', '901'];
        $response['condition'] = $condition;
        for ($i = 0; $i<=10000; $i++) {
            $str = (string) $i;
            $k = 0;
            foreach ($condition as $c) {
                if (strpos($str, $c) !== false ) {$k = 1;}
            }
            if ($k == 0) {
                $arr[] = $i;
            }
        }
        $response['arr'] = $arr;
        return $response;
    }
    public function test3()
    {
        $tmp = new Test();
        //$tmp->test_fill(15);
        $arr = $tmp->test_get();
        $response['arr'] = $arr;
        $tmp = Test::all();
        $response['all'] = null;
        foreach($tmp as $t) {
            $response['all'][$t['id']]['id'] = $t['id'];
            $response['all'][$t['id']]['script_name'] = $t['script_name'];
            $response['all'][$t['id']]['start_time']  = $t['start_time'];
            $response['all'][$t['id']]['end_time']  = $t['end_time'];
            $response['all'][$t['id']]['result']  = $t['result'];
        }
        return $response;
    }
    public function test4()
    {
        $groups = Group::all();
        $products = Product::all();
        foreach ($groups as $group) {
            $k = 0;
            foreach ($products as $product) {
                if ( $product['id_group'] == $group['id']) {$k = $k + 1;};
            }
            $group['p_count'] = $k;
        }
        $response['show'][0] = 'false';
        foreach ($groups as $group1) {
            $s = 0;
            $s = $s + $group1['p_count'];
            foreach ($groups as $group2) {
                if ($group2['id_parent'] == $group1['id']) {
                    $s = $s + $group2['p_count'];
                    foreach ($groups as $group3) {
                        if ($group3['id_parent'] == $group2['id']) {
                            $s = $s + $group3['p_count'];
                        }
                    }
                }
            }
            $group1['p_count_all'] = $s;
            $response['show'][$group1['id_parent']] = 'false';
        }
        $response['groups'] = $groups->groupBy('id_parent');
        $response['products'] = $products;
        $response['g_count'] = count($response['groups']);
        $response['p_all'] = count($response['products']);
        $response['tmp'] = array_reverse((array) $groups);
        return $response;
    }
    public function test41($id)
    {
        $groups = Group::all();
        $products = Product::all();
        $tmp = null;
        foreach ($groups as $group1) {
            if ( $group1['id'] == $id) {
                $tmp[] = $group1;
            }
            if ( $group1['id_parent'] == $id) {
                $tmp[] = $group1;
                foreach ($groups as $group2) {
                    if ( $group2['id_parent'] == $group1['id']) {
                        $tmp[] = $group2;
                    }
                }
            }
        }
        foreach ($products as $product) {
            foreach ($tmp as $t) {
                if ($product['id_group'] == $t['id']) {
                    $response['products'][] = $product;
                }
            }
        }

        return $response;
    }
}
