<?php

use Encore\Admin\Grid;

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Encore\Admin\Form::forget(['map', 'editor']);

//表格的初始化
Grid::init(function (Grid $grid) {

    $grid->disableFilter();

    /*Grid快捷键*/
//    $grid->enableHotKeys();

    /*为每一行添加序号*/
    $grid->rows(function ($row, $number) {
        $row->column('number', $number + 1);
    });

});