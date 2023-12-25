<?php
use App\Models\Brand;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$brand = Brand::find($id);
if($brand == null)
{
    header("location:index.php?option=brand&cat=recycle&sort=$sort&page=$j");
}
MyClass::set_flash('message', ['type' => 'alert-success', 'msg' => 'Xóa thành công ! ']);
$brand->delete();
header("location:index.php?option=brand&cat=recycle&sort=$sort&page=$j");