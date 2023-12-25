<?php
use App\Models\Category;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$category = Category::find($id);
if($category == null)
{
    header("location:index.php?option=category&sort=$sort&page=$j");
    MyClass::set_flash('message', ['type' => 'alert-danger', 'msg' => 'xóa thất bại !']);
}
$category->status =0;
$category->updated_at = date('Y-m-d H:i:s');
$category->updated_by = 1;
$category->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=category");
    exit;
}
MyClass::set_flash('message', ['type' => 'alert-success', 'msg' => 'Thêm vào thùng rác thành công !']);
header("location:index.php?option=category&sort=$sort&page=$j");