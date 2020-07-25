<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use Zhusaidong\GridExporter\Exporter;

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
        $exporter = Exporter::get($grid);
        $exporter->setFileName('文章列表.xlsx');
        global $isAdmin;
        $isAdmin = Admin::user()->isAdministrator();
        $states = [
            'on' => ['text' => 'YES'],
            'off' => ['text' => 'NO'],
        ];

        //非超级管理员只能管理自己为作者的文章
        if (!$isAdmin) {
            $grid->model()->where('user_id', '=', Admin::user()->id);
        }
        //对文章进行置顶排序
        $grid->model()
            ->orderBy('sort', 'desc')
            ->orderBy('id', 'desc');

        $grid->column('number', __('Number'));
        $grid->column('title', __('Title'))
            ->limit(40);
        $grid->column('user.name', __('Author'));
        $grid->column('category.name', __('Category'))
            ->badge('green');
        $grid->column('views', __('Views'))
            ->sortable()
            ->label('warning');
        $grid->column('sort', __('Sort'))
            ->sortable()
            ->replace([0 => '-'])
            ->help('最大值置顶')
            ->editable()
            ->label('default');
        $grid->column('switch group', __('Switch group'))
            ->switchGroup([
                'comments' => '评论',
                'status' => '发布'
            ], $states);
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
        $show->field('comments', __('Comments'));
        $show->field('status', __('Status'));
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
                ->autofocus()
                ->rules('required|max:50');
        });
        $form->textarea('description', __('Description'))
            ->rules('required|max:200');
        $form->text('keywords', __('Keywords'));
        $form->divider();
        $form->column(3, function ($form) {
            $form->select('category_id', __('Category'))
                ->setWidth(8, 4)
                ->options(Category::pluck('name', 'id'))
                ->ajax('/admin/select/categories');
        });
        $form->column(3,function ($form){
            $form->switch('comments', __('Comments'))
                ->default(1)
                ->setWidth(8, 4);
        });
        $form->column(3, function ($form) {
            $form->switch('status', __('Status'))
                ->default(1)
                ->setWidth(8, 4);
        });
        $form->column(3, function ($form) {
            $form->number('sort', __('Sort'))
                ->default(0)
                ->min(0)
                ->setWidth(8, 4);
        });
        $form->column(12, function ($form) {
            $form->multipleSelect('tags', __('Tag'))
                ->options(Tag::pluck('name', 'id'))
                ->ajax('/admin/select/tags');
        });
        $form->editormd('markdown', __('Markdown'))
            ->required();

        return $form;
    }

}
