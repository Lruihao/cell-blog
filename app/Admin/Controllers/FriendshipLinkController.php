<?php

namespace App\Admin\Controllers;

use App\Admin\Models\FriendshipLink;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

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

        $grid->column('number', __('Number'));
        $grid->column('name', __('Name'));
        $grid->column('url', __('Url'));
        $grid->column('sort', __('Sort'))
            ->sortable()
            ->replace([0 => '-'])
            ->editable()
            ->label('default');
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

        $form->text('name', __('Name'));
        $form->url('url', __('Url'));
        $form->number('sort', __('Sort'))
            ->default(0)
            ->min(0);

        return $form;
    }
}
