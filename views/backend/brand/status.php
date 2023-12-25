<?php
use App\Models\Brand;
use App\Libraries\MyClass;
$sort = $_REQUEST['sort'];
$id = $_REQUEST['id'];
$j = $_REQUEST['page'];
$t = 0;
$brand = Brand::find($id);
if($brand == null)
{
    header("location:index.php?option=brand&sort=$sort&page=$j");
}
$t=$brand->status = ($brand->status == 1) ? 2 : 1;
$brand->updated_at = date('Y-m-d H:i:s');
$brand->updated_by = 1;
$brand->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=brand");
    exit;
}
if($t==1)
{
    MyClass::set_flash('message', ['type' => 'alert-success', 'msg' => 'Bật ! ']);
}
else
{
    MyClass::set_flash('message', ['type' => 'alert-success', 'msg' => 'Tắt !']);
}
header("location:index.php?option=brand&sort=$sort&page=$j");