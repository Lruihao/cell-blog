<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
//    protected $fillable = ['system_key', 'system_value'];

//    public $timestamps  = false;

    public static function keyValue($key)
    {
        return optional(System::where('system_key', $key)->first())->value;
    }

    public static function optionList()
    {
        $list = System::all(['system_key', 'system_value']);
        $system = call_user_func(function () {
            $init = [];
            $config = array_flip(config('blog.system_key'));
            foreach ($config as $key => $value) {
                $init[$key] = '';
            }
            return $init;
        });

        foreach ($list as $item) {
            $system[$item['system_key']]  = $item['system_value'];
        }

        return $system;
    }
}
