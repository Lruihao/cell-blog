<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Article;
use App\Admin\Models\AdminUser;
use App\Admin\Models\Category;
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
    protected $title = '文章管理';

    /**
     * 创建文章表格
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('user_id', __('Author'))
            ->display(function($userId) {
            return AdminUser::find($userId)->name;
        });
        $grid->column('views', __('Views'));
        $grid->column('category_id', __('Category'))
            ->display(function($categoryId) {
            return Category::find($categoryId)->name;
        });
        $grid->column('sort', __('Sort'));
        $grid->column('password', __('Password'));
        $grid->column('created_at', __('Created at'))
            ->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))
            ->date('Y-m-d H:i:s');

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

        $show->field('title', __('Title'));
        $show->field('user_id', __('Author'));
        $show->field('category_id', __('Category'));
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
     * 创建新增文章表单
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());

        $form->text('title', __('Title'));
        $form->number('user_id', __('Author'));
        $form->number('category_id', __('Category'));
        $form->text('description', __('Description'));
        $form->text('keywords', __('Keywords'));
        $form->number('sort', __('Sort'));
        $form->password('password', __('Password'));
        $form->number('views', __('Views'));
        $form->editormd('markdown');

        return $form;
    }
}
