<?php

namespace App\Admin\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CustomerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '客户列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Customer);

        $grid->column('id', __('Id'));
        $grid->column('name', __('客户'));
        $grid->column('collection', __('收藏的产品'))->display(function () {
            $arr = [];
            $product = Product::all()->toArray();
            foreach ($this->collection as $val) {
                foreach ($product as $key => $item) {
                    if ($val == $item['id']) {
                        array_push($arr, $product[$key]['name']);
                    }
                }
            }
             return $arr;
        });
        $grid->column('have', __('合作产品'))->display(function () {
            $arr = [];
            $product = Product::all()->toArray();
            foreach ($this->have as $val) {
                foreach ($product as $key => $item) {
                    if ($val == $item['id']) {
                        array_push($arr, $product[$key]['name']);
                    }
                }
            }
            return  $arr;
        });
        $grid->column('apply', __('客户的申请'));
        $grid->column('phone', __('联系电话'));
        $grid->column('address', __('地址'));
        $grid->column('company', __('公司'));

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
        $show = new Show(Customer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('openid', __('Openid'));
        $show->field('collection', __('Collection'));
        $show->field('apply', __('Apply'));
        $show->field('have', __('Have'));
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
        $form = new Form(new Customer);

        $form->text('openid', __('客户标识'));
        $form->number('sex', __('称呼'));
        $form->text('name', __('客户姓名'));
        $form->text('phone', __('联系电话'));
        $form->multipleSelect('collection', '收藏的产品')->options(Product::all()->pluck('name','id'));
        $form->multipleSelect('have', '合作产品')->options(Product::all()->pluck('name','id'));
        $form->text('apply', __('Ta的申请'));
        $form->text('company', __('公司'));
        $form->text('address', __('地址'));

        return $form;
    }
}
