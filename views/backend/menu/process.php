<?php 
use App\Models\Menu;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Brand;
use App\Libraries\MyClass;
use App\Libraries\Upload;
// if(isset($_POST['UPDATE_SORT_ORDER']))
// {
//     //print_r($_POST['sort_order']);
//     $list = $_POST['sort_order'];
//     foreach($list as $id => $sort_order)
//     {
//         $menu = Menu::find($id);
//         $menu->sort_order = $sort_order;
//         $menu->save();
//     }
//     MyClass::set_flash('message',['type' => 'success','msg'=>'Lưu sắp xếp thành công' ]);
//     //header("location:index.php?option=menu");
// }

//Thêm menu từ Category
if(isset($_POST['addcategory']))
{

   
    if(isset($_POST['categoryid']))
    {
        $list_categoryid = $_POST['categoryid'];
        foreach($list_categoryid as $id)
        {
            $category = Category::find($id);
            $menu = new Menu();
            $menu->name = $category->name;
            $menu->link = 'index.php?option=product&cat=' .$category->slug;
            $menu->type = 'category';
            $menu->table_id = $id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->level = 1;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
            $menu->status = 2;
            $menu->save();
            MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công']);
        }
    }else{
        MyClass::set_flash('message',['type'=>'danger','msg'=>'Chưa chọn danh mục']);
    }
    header("location:index.php?option=menu");
}
if(isset($_POST['addbrand']))
{

   
    if(isset($_POST['brandid']))
    {
        $list_brandid = $_POST['brandid'];
        foreach($list_brandid as $id)
        {
            $brand = Brand::find($id);
            $menu = new Menu();
            $menu->name = $brand->name;
            $menu->link = 'index.php?option=product&cat=' .$brand->slug;
            $menu->type = 'brand';
            $menu->table_id = $id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->level = 1;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
            $menu->status = 2;
            $menu->save();
            MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công']);
        }
    }else{
        MyClass::set_flash('message',['type'=>'danger','msg'=>'Chưa chọn danh mục']);
    }
    header("location:index.php?option=menu");
}
if(isset($_POST['addtopic']))
{

   
    if(isset($_POST['topicid']))
    {
        $list_topicid = $_POST['topicid'];
        foreach($list_topicid as $id)
        {
            $topic = Topic::find($id);
            $menu = new Menu();
            $menu->name = $topic->name;
            $menu->link = 'index.php?option=product&cat=' .$topic->slug;
            $menu->type = 'topic';
            $menu->table_id = $id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->level = 1;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
            $menu->status = 2;
            $menu->save();
            MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công']);
        }
    }else{
        MyClass::set_flash('message',['type'=>'danger','msg'=>'Chưa chọn danh mục']);
    }
    header("location:index.php?option=menu");
}
if(isset($_POST['addpage']))
{

   
    if(isset($_POST['pageid']))
    {
        $list_pageid = $_POST['pageid'];
        foreach($list_pageid as $id)
        {
            $page = Post::find($id);
            $menu = new Menu();
            $menu->name = $page->title;
            $menu->link = 'index.php?option=product&cat=' .$page->slug;
            $menu->type = 'page';
            $menu->table_id = $id;
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->level = 1;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
            $menu->status = 2;
            $menu->save();
            MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công']);
        }
    }else{
        MyClass::set_flash('message',['type'=>'danger','msg'=>'Chưa chọn danh mục']);
    }
    header("location:index.php?option=menu");
}

if(isset($_POST['addcustom']))
{

   
    if(strlen($_POST['name'])>0 &&strlen($_POST['link'])>0)
    {
       
            $menu = new Menu();
            $menu->name = $_POST['name'];
            $menu->link = $_POST['link'];
            $menu->type = 'custome';
           
            $menu->sort_order = 1;
            $menu->position = $_POST['position'];
            $menu->parent_id = 0;
            $menu->level = $_POST['level']??1;
            $menu->created_at = date('Y-m-d H:i:s');
            $menu->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
            $menu->status = 2;
            $menu->save();
            MyClass::set_flash('message',['type'=>'success','msg'=>'Thêm thành công']);
    }else{
        MyClass::set_flash('message',['type'=>'danger','msg'=>'Chưa nhập tên và link']);
    }
    header("location:index.php?option=menu");
}


if(isset($_POST['deletes']))
{
    $list = $_POST['check_id'];
    
   foreach($list as $value)
    {
        $category = menu::find($value);
        $category->delete();
    }
    MyClass::set_flash('message',['type'=>'alert-success','msg'=>'xóa thành công thành công']);
   header('location:?option=menu&cat=recycle');
}


if(isset($_POST['edit']))
{

            $id = $_REQUEST['id'];
            $menu = Menu::find($id);
            $menu->name = $_POST['name'];
            $menu->link = $_POST['link'];
            $menu->sort_order = $_POST['sort_order'];
            $menu->position = $_POST['position'];
            $menu->parent_id = $_POST['parent_id'];
            $menu->level = 1;
            $menu->updated_at = date('Y-m-d H:i:s');
            $menu->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
            $menu->status = $_POST['status'];
            $menu->save();
            MyClass::set_flash('message',['type'=>'alert-success','msg'=>'cập nhật thành công']);
    header("location:index.php?option=menu");
}
