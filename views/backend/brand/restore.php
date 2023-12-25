<?php
use App\Models\Brand;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];

$brand = Brand::find($id);
if($brand == null)
{
    header("location:index.php?option=brand&sort=$sort&page=$j&cat=recycle");
}
$brand->status = 2;
$brand->updated_at = date('Y-m-d H:i:s');
$brand->updated_by = 1;
$brand->save();

    MyClass::set_flash('message', ['type' => 'alert-success', 'msg' => 'Phục hồi thành công ! ']);


header("location:index.php?option=brand&cat=recycle&sort=$sort&page=$j");