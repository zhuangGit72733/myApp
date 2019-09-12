<?php

namespace App\Admin\Controllers;

use App\Models\Apply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ApplyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '申请列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Apply);

        $grid->column('id', __('Id'));
        $grid->column('customer_id', __('用户id'));
        $grid->column('product_id', __('申请产品id'));
        $grid->column('status', __('当前状态'));
        $grid->column('updated_at', __('更新时间'));

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
        $show = new Show(Apply::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('customer_id', __('Customer id'));
        $show->field('product_id', __('Product id'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Apply);

        $form->text('customer_id', __('客户id'));
        $form->text('product_id', __('产品id'));
        $form->number('status', __('当前状态'));

        return $form;
    }
}
