<?php

namespace App\Admin\Controllers;

use App\Models\System;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Zhusaidong\GridExporter\Exporter;

class SystemController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '博客配置';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new System());
        $exporter = Exporter::get($grid);
        $exporter->setFileName('配置列表.xlsx');

        $grid->header(function () {
            return <<<html
            <div class='text-center'>
                <i class='fa fa-info-circle'></i>
                <span>参数详见: config/blog.php ,</span>
                <span>参数使用: config(\$key) ,</span>
                <span>eg. config(\$title)</span>
            </div>
html;
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('number', __('Number'));
        $grid->column('name', __('Name'));
        $grid->column('system_key', __('System key'))
            ->display(function ($system_key){
                return "<span class='btn btn-xs btn-twitter'>{$system_key}</span>";
            });
        $grid->column('system_value', __('System value'))
            ->display(function ($value){
                return htmlspecialchars($value);
        })->limit(100);
        $grid->column('status', __('Status'))
            ->switch();
        $grid->column('created_at', __('Created at'))
            ->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))
            ->date('Y-m-d H:i:s');

        $grid->quickSearch('name')->placeholder('搜索设置...');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(System::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('system_key', __('System key'));
        $show->field('system_value', __('System value'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new System());

        $form->text('name', __('Name'))
            ->autofocus()
            ->rules('required|max:20');
        $form->text('system_key', __('System key'))
            ->rules('required|max:20');
        $form->textarea('system_value', __('System value'));
        $form->switch('status', __('Status'))
            ->default(1);

        return $form;
    }

    /**
     * Load configure into laravel from database.
     *
     * @return void
     */
    public static function load()
    {
        $systemList = System::where('status', '=', 1)
            ->pluck('system_value', 'system_key');
        foreach ($systemList as $key => $value) {
            config([$key => $value]);
        }
    }

}
