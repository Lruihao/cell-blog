<?php


namespace App\Admin\Api;

class UploadApi
{
    /**
     * 上传文件
     *
     * @param        $name            form 表单中的 name
     * @param string $path 文件保存的目录 相对于 /public 目录
     * @param array $allowExtension 允许上传的文件后缀
     * @param bool $childPath 是否按日期创建目录
     *
     * @return array
     */
    public static function file($name, $path = 'uploads', $allowExtension = [], $childPath = true)
    {
        // 判断请求中是否包含name=file的上传文件
        if (!request()->hasFile($name)) {
            $data = [
                'status_code' => 401,
                'message' => '上传文件为空'
            ];
            return $data;
        }

        $file = request()->file($name);

        // 判断是否多文件上传
        if (!is_array($file)) {
            $file = [$file];
        }

        // 过滤所有的.符号
        $path = str_replace('.', '', $path);

        // 先去除两边空格
        $path = trim($path, '/');

        // 判断是否需要生成日期子目录
        $path = $childPath ? $path . '/' . date('Ymd') : $path;

        // 获取目录的绝对路径
        $publicPath = public_path($path . '/');

        // 如果目录不存在；先创建目录
        is_dir($publicPath) || mkdir($publicPath, 0755, true);

        // 上传成功的文件
        $success = [];

        // 循环上传
        foreach ($file as $k => $v) {
            //判断文件上传过程中是否出错
            if (!$v->isValid()) {
                $data = [
                    'status_code' => 500,
                    'message' => '文件上传出错'
                ];
                return $data;
            }
            // 获取上传的文件名
            $oldName = $v->getClientOriginalName();

            // 获取文件后缀
            $extension = strtolower($v->getClientOriginalExtension());

            // 判断是否是允许的文件类型
            if (!empty($allowExtension) && !in_array($extension, $allowExtension)) {
                $data = [
                    'status_code' => 500,
                    'message' => $oldName . '的文件类型不被允许'
                ];
                return $data;
            }

            // 组合新的文件名
            $newName = uniqid() . '.' . $extension;

            // 判断上传是否失败
            if (!$v->move($publicPath, $newName)) {
                $data = [
                    'status_code' => 500,
                    'message' => '保存文件失败'
                ];
                return $data;
            } else {
                $success[] = [
                    'name' => $oldName,
                    'path' => '/' . $path . '/' . $newName
                ];
            }
        }

        //上传成功
        $data = [
            'status_code' => 200,
            'message' => '上传成功',
            'data' => $success
        ];
        return $data;
    }

    /**
     * 上传图片
     *
     * @param        $name
     * @param string $path
     *
     * @return array
     */
    public static function image($name, $path = 'uploads')
    {
        $allowExtension = [
            'jpg',
            'jpeg',
            'png',
            'gif',
            'bmp'
        ];
        return self::file($name, $path, $allowExtension);
    }

}