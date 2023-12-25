<?php
use App\Models\Brand;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$brand = Brand::find($id);
if($brand == null)
{
    header("location:index.php?option=brand&sort=$sort&page=$j");
}
$brand->status =0;
$brand->updated_at = date('Y-m-d H:i:s');
$brand->updated_by = 1;
$brand->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=brand");
    exit;
}
MyClass::set_flash('message', ['type' => 'alert-success', 'msg' => 'Đã thêm vào thùng rác ! ']);
header("location:index.php?option=brand&sort=$sort&page=$j");