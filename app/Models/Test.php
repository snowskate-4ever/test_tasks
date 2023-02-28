<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    private function test_fill($k)
    {
        for($i = 0; $i<=$k;$i++) {
            $name = rand(0,1000).'_script';
            $start_time = rand( 1, 10000);
            $end_time = $start_time + rand( 1, 1000);
            $tmp = rand(0,3);
            switch ($tmp) {
                case 0:
                    $result = 'normal';
                    break;
                case 1:
                    $result = 'illegal';
                    break;
                case 2:
                    $result = 'failed';
                    break;
                case 3:
                    $result = 'success';
                    break;
            }
            $data = [
                'script_name' => $name,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'result' => $result
            ];
            Test::create($data);
        }
    }
    public function test_get()
    {
        $tmp = Test::all();
        $response = null;
        foreach($tmp as $t) {
            if ($t['result'] == 'normal'||$t['result'] == 'success') {
                $response[$t['id']]['id'] = $t['id'];
                $response[$t['id']]['script_name'] = $t['script_name'];
                $response[$t['id']]['start_time']  = $t['start_time'];
                $response[$t['id']]['end_time']  = $t['end_time'];
                $response[$t['id']]['result']  = $t['result'];
            }
        }
        return $response;
    }
}
