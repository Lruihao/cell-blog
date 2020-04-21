<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Article;
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
    protected $title = '文章管理';

    /**
     * 创建文章表格
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        //非超级管理员只能管理自己为作者的文章
        if (!Admin::user()->isAdministrator()) {
            $grid->model()->where('user_id', '=', Admin::user()->id);
        }
        //对文章进行置顶排序
        $grid->model()->orderBy('sort', 'desc');

        $grid->column('number', __('Number'));
        $grid->column('title', __('Title'))
            ->limit(30)
            ->filter('like');
        $grid->column('user.name', __('Author'));
        $grid->column('views', __('Views'))
            ->hide();
        //设置颜色，默认`success`,可选`danger`、`warning`、`info`、`primary`、`default`、`success`
        $grid->column('category.name', __('Category'))
            ->label('primary');
        $grid->column('sort', __('Sort'))
            ->sortable()
            ->replace([0 => '-'])
            ->help('最大值置顶')
            ->editable()
            ->hide();
        $grid->column('created_at', __('Created at'))
            ->date('Y-m-d H:i:s')
            ->filter('date');
        $grid->column('updated_at', __('Updated at'))
            ->date('Y-m-d H:i:s')
            ->filter('date')
            ->hide();

        //为每一行添加序号
        $grid->rows(function ($row, $number) {
            $row->column('number', $number + 1);
        });

        //数据过滤器
        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->column(1 / 2, function ($filter) {
                $filter->like('title', __('Title'));
                if (Admin::user()->isAdministrator()) {
                    $filter->like('user.name', __('Author'));
                }
            });
            $filter->column(1 / 2, function ($filter) {
                $filter->date('created_at', __('Created at'));
                $filter->date('updated_at', __('Updated at'));
            });
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
