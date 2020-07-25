<?php

namespace App\Admin\Controllers;

use App\Models\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Zhusaidong\GridExporter\Exporter;

class PageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '二级页面';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page());
        $exporter = Exporter::get($grid);
        $exporter->setFileName('页面列表.xlsx');
        $states = [
            'on' => ['text' => 'YES'],
            'off' => ['text' => 'NO'],
        ];

        $grid->header(function () {
            return <<<html
            <div class='text-center'>
                <i class='fa fa-info-circle'></i>
                <span>
                    系统: 关于 about(需创建)，
                    留言 guestbook(需创建)，
                    友链 links(内置)，
                    相册 ablum(内置，详见config/blog.php)
                </span>
            </div>
html;
        });

        $grid->model()->orderBy('id', 'desc');

        $grid->column('number', __('Number'));
        $grid->column('title', __('Title'))
            ->limit(40);
        $grid->column('link_alias', __('Link alias'));
        $grid->column('description', __('Description'))
            ->limit(40);
        $grid->column('switch group', __('Switch group'))
            ->switchGroup([
                'comments' => '评论',
                'status' => '发布'
            ], $states);
        $grid->column('created_at', __('Created at'))
            ->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))
            ->date('Y-m-d H:i:s');

        $grid->quickSearch('title')->placeholder('搜索标题...');

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
        $show = new Show(Page::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('link_alias', __('Link alias'));
        $show->field('keywords', __('Keywords'));
        $show->field('description', __('Description'));
        $show->field('comments', __('Comments'));
        $show->field('status', __('Status'));
        $show->field('password', __('Password'));
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
        $form = new Form(new Page());

        $form->setWidth(11, 1);
        $form->column(12,function ($form){
            $form->text('title', __('Title'))
                ->autofocus()
                ->rules('required|max:50');;
        });
        $form->column(12,function ($form){
            $form->textarea('description', __('Description'))
            ->rules('required|max:200');
        });
        $form->text('keywords', __('Keywords'))
            ->required();
        $form->divider();
        $form->column(3,function ($form){
            $form->text('link_alias', __('Link alias'))
                ->setWidth(8, 4)
                ->required();
        });
        $form->column(3,function ($form){
            $form->switch('comments', __('Comments'))
                ->default(1)
                ->setWidth(8, 4);
        });
        $form->column(3,function ($form){
            $form->switch('status', __('Status'))
                ->default(1)
                ->setWidth(8, 4);
        });
        $form->column(12,function ($form) {
            $form->editormd('markdown', __('Markdown'))
                ->required();
        });

        return $form;
    }
}
