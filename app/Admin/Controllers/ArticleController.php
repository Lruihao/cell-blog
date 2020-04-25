<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Article;
use App\Admin\Models\Category;
use App\Admin\Models\Tag;
use App\Admin\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章';

    /**
     * 创建文章表格
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());
        global $isAdmin;
        $isAdmin = Admin::user()->isAdministrator();

        //非超级管理员只能管理自己为作者的文章
        if (!$isAdmin) {
            $grid->model()->where('user_id', '=', Admin::user()->id);
        }
        //对文章进行置顶排序
        $grid->model()->orderBy('sort', 'desc');

        $grid->column('title', __('Title'))
            ->limit(40);
        $grid->column('user.name', __('Author'));
        $grid->column('category.name', __('Category'))
            ->badge('green');
        $grid->column('views', __('Views'))
            ->label('warning');
        $grid->column('sort', __('Sort'))
            ->sortable()
            ->replace([0 => '-'])
            ->help('最大值置顶')
            ->editable()
            ->label('default');
        $grid->column('created_at', __('Created at'))
            ->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))
            ->date('Y-m-d H:i:s');

        //搜索
        $grid->quickSearch('title')->placeholder('搜索标题...');
        //分类,作者选择器
        $grid->selector(function (Grid\Tools\Selector $selector) {
            global $isAdmin;
            $selector->select('category_id', __('Category'), Category::pluck('name', 'id'));
            if ($isAdmin) {
                $selector->select('user_id', __('Author'), User::pluck('name', 'id'));
            }
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

        $form->setWidth(11, 1);
        $form->column(12, function ($form) {
            $form->text('title', __('Title'))
                ->required();
        });
        $form->textarea('description', __('Description'))
            ->required();
        $form->text('keywords', __('Keywords'));
        $form->divider();
        $form->column(4, function ($form) {
            $form->select('category_id', __('Category'))
                ->setWidth(9, 3)
                ->options(Category::pluck('name', 'id'))
                ->ajax('/admin/select/categories');
        });
        $form->column(4, function ($form) {
            $form->password('password', __('Password'))
                ->setWidth(9, 3);
        });
        $form->column(4, function ($form) {
            $form->number('sort', __('Sort'))
                ->default(0)
                ->min(0)
                ->setWidth(9, 3);
        });
        $form->column(12, function ($form) {
            $form->multipleSelect('tags', __('Tag'))
                ->options(Tag::pluck('name', 'id'))
                ->ajax('/admin/select/tags');
        });
        $form->divider();
        $form->editormd('markdown', __('内容'))
            ->required();

        return $form;
    }

}
