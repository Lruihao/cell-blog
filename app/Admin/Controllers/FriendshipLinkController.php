<?php

namespace App\Admin\Controllers;

use App\Models\FriendshipLink;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Zhusaidong\GridExporter\Exporter;

class FriendshipLinkController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '友情链接';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new FriendshipLink());
        $exporter = Exporter::get($grid);
        $exporter->setFileName('友链列表.xlsx');

        $grid->model()
            ->orderBy('sort', 'desc')
            ->orderBy('id', 'desc');

        $grid->column('number', __('Number'));
        $grid->column('name', __('Name'));
        $grid->column('url', __('Url'));
        $grid->column('avatar', __('Avatar'))
            ->gallery(['width' => 50, 'height' => 50]);
        $grid->column('description', __('Description'));
        $grid->column('sort', __('Sort'))
            ->sortable()
            ->replace([0 => '-'])
            ->editable()
            ->label('default');
        $grid->column('status', __('Status'))
            ->switch();
        $grid->column('created_at', __('Created at'))
            ->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))
            ->date('Y-m-d H:i:s');

        $grid->quickSearch('name')->placeholder('搜索友链...');

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
        $show = new Show(FriendshipLink::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('url', __('Url'));
        $show->field('sort', __('Sort'));
        $show->field('status', __('Status'));
        $show->field('avatar', __('Avatar'));
        $show->field('description', __('Description'));
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
        $form = new Form(new FriendshipLink());

        $form->text('name', __('Name'))
            ->autofocus()
            ->rules('required|max:20');
        $form->url('url', __('Url'))
            ->required();
        $form->text('description', __('Description'))
            ->rules('required|max:100');
        $form->url('avatar', __('Avatar'));
        $form->number('sort', __('Sort'))
            ->default(0)
            ->min(0);
        $form->switch('status', __('Status'))
            ->default(1);

        return $form;
    }
}
