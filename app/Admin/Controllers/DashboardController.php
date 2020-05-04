<?php

namespace App\Admin\Controllers;

class DashboardController
{
    /**
     * 显示后台面板大标题
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function index()
    {
        return view('admin.dashboard');
    }
}