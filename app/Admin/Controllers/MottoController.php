<?php

namespace App\Admin\Controllers;

use App\Models\Motto;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Zhusaidong\GridExporter\Exporter;

class MottoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '格言';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Motto());
        $exporter = Exporter::get($grid);
        $exporter->setFileName('格言列表.xlsx');

        $grid->model()->orderBy('id', 'desc');

        $grid->column('number', __('Number'));
        $grid->column('motto', __('Motto'))
            ->limit(100);
        $grid->column('created_at', __('Created at'))
            ->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))
            ->date('Y-m-d H:i:s');

        $grid->quickSearch('motto')->placeholder('搜索格言...');
        $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
            $create->text('motto', __('Motto'));
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
        $show = new Show(Motto::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('motto', __('Motto'));
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
        $form = new Form(new Motto());

        $form->text('motto', __('Motto'))
            ->autofocus()
            ->rules('required|max:50');

        return $form;
    }
}
