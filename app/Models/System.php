<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    /**
     * @param $key
     * @return mixed
     */
    public static function keyValue($key)
    {
        return optional(System::where('system_key', $key)->first())->value;
    }

    /**
     * 获取系统设置列表
     * @return mixed
     */
//    public static function optionList()
//    {
//        $list = System::all(['system_key', 'system_value']);
//        $systems = call_user_func(function () {
//            $init = [];
//            $config = array_flip(config('blog.system_key'));
//            foreach ($config as $key => $value) {
//                $init[$key] = '';
//            }
//            return $init;
//        });
//
//        foreach ($list as $item) {
//            $systems[$item['system_key']] = $item['system_value'];
//        }
//
//        return $systems;
//    }
}
