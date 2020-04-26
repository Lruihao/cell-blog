<?php


namespace App\Admin\Controllers;

use App\Admin\Api\UploadApi;

class EditorImageController
{
    /**
     * 上传文章图片
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload()
    {
        $result = UploadApi::image('editormd-image-file', 'storage/editor-images');
        if ($result['status_code'] === 200) {
            $data = [
                'success' => 1,
                'message' => $result['message'],
                'url' => $result['data'][0]['path'],
            ];
        } else {
            $data = [
                'success' => 0,
                'message' => $result['message'],
                'url' => '',
            ];
        }
        return response()->json($data);
    }
}