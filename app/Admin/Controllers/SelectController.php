<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Category;
use App\Admin\Models\Tag;
use Illuminate\Http\Request;

class SelectController
{
    /**
     * 异步加载分类
     * @param Request $request
     * @return mixed
     */
    public function categories(Request $request){
        $q = $request->get('q');
        return Category::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }

    /**
     * 异步加载标签
     * @param Request $request
     * @return mixed
     */
    public function tags(Request $request){
        $q = $request->get('q');
        return Tag::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }
}
