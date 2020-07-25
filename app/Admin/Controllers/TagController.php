<?php

namespace App\Admin\Controllers;

use App\Models\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Zhusaidong\GridExporter\Exporter;

class TagController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '标签';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tag());
        $exporter = Exporter::get($grid);
        $exporter->setFileName('标签列表.xlsx');

        $grid->model()->orderBy('id', 'desc');

        $grid->column('number', __('Number'));
        $grid->column('name', __('Name'))
            ->badge('purple');;
        $grid->column('articles', __('Article amount'))
            ->display(function ($articles) {
                $count = count($articles);
                return "{$count} 篇";
            })->label('primary');
        $grid->column('description', __('Description'))
            ->limit(40);
        $grid->column('created_at', __('Created at'))
            ->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))
            ->date('Y-m-d H:i:s');

        //搜索
        $grid->quickSearch('name')->placeholder('搜索标签...');
        $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
            $create->text('name', __('Name'));
            $create->text('description', __('Description'));
        });

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
        $show = new Show(Tag::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('keywords', __('Keywords'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * 创建新增标签表单
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Tag());

        $form->text('name', __('Name'))
            ->autofocus()
            ->rules('required|max:20');
        $form->text('description', __('Description'))
            ->rules('required|max:100');
        $form->text('keywords', __('Keywords'));

        return $form;
    }
}
