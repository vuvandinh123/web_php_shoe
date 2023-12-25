<?php
use App\Models\Category;
use App\Libraries\MyClass;
$sort = $_REQUEST['sort'];
$id = $_REQUEST['id'];
$j = $_REQUEST['page'];
$t=0;
$category = Category::find($id);
if($category == null)
{
    header("location:index.php?option=category&sort=$sort&page=$j");
}
$category->status = ($category->status == 1) ? 2 : 1;
$t = $category->status;
$category->updated_at = date('Y-m-d H:i:s');
$category->updated_by = 1;
$category->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=category");
    exit;
}
if($t==1)
{
    MyClass::set_flash('message', ['type' => 'alert-success', 'msg' => 'Bật danh mục thành công ! ']);
}
else
{
    MyClass::set_flash('message', ['type' => 'alert-success', 'msg' => 'Tắt danh mục thành công !']);
}


header("location:index.php?option=category&sort=$sort&page=$j");