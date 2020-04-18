<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Admin\Models\Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('author', __('Author'));
        $grid->column('category_id', __('Category id'));
        $grid->column('description', __('Description'));
        $grid->column('keywords', __('Keywords'));
        $grid->column('sort', __('Sort'));
        $grid->column('password', __('Password'));
        $grid->column('views', __('Views'));
        $grid->column('markdown', __('Markdown'));
        $grid->column('html', __('Html'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('author', __('Author'));
        $show->field('category_id', __('Category id'));
        $show->field('description', __('Description'));
        $show->field('keywords', __('Keywords'));
        $show->field('sort', __('Sort'));
        $show->field('password', __('Password'));
        $show->field('views', __('Views'));
        $show->field('markdown', __('Markdown'));
        $show->field('html', __('Html'));
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
        $form = new Form(new Article());

        $form->text('title', __('Title'));
        $form->text('author', __('Author'));
        $form->switch('category_id', __('Category id'));
        $form->text('description', __('Description'));
        $form->text('keywords', __('Keywords'));
        $form->number('sort', __('Sort'));
        $form->password('password', __('Password'));
        $form->number('views', __('Views'));
        $form->textarea('markdown', __('Markdown'));
        $form->textarea('html', __('Html'));

        return $form;
    }
}
