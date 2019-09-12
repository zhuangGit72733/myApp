<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\Type;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '产品列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->column('id', __('Id'));
        $grid->column('type.name', __('分类名称'));
        $grid->column('name', __('产品名称'));
        $grid->column('description', __('产品描述'));
        $grid->column('logo','logo图')->display(function (){
            if ($this->logo){
                return '<div class="pop"><img src='.env('APP_URl').'/uploads/'.$this->logo.' style="width:100px;height:100px;"></div>';
            }else{
                return ;
            }
        });
        $grid->column('price', __('价格'));
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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type_id', __('Type id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('logo', __('Logo'));
        $show->field('price', __('Price'));
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
        $form = new Form(new Product);

        $form->select('type_id', __('分类名称'))->options(Type::all()->pluck('name','id'));
        $form->text('name', __('产品名称'));
        $form->textarea('description', __('产品描述'));
        $form->image('logo', __('logo图'));
        $form->text('price', __('价格'));

        return $form;
    }
}
