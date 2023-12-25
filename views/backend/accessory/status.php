<?php
use App\Models\Product;
use App\Libraries\MyClass;
$sort = $_REQUEST['sort']??'';
$id = $_REQUEST['id']??'';
$j = $_REQUEST['page']??'';
$product = Product::find($id);

if($product == null)
{
    header("location:index.php?option=accessory&sort=$sort&page=$j");
}
$t=$product->status = ($product->status == 1) ? 2 : 1;
$product->updated_at = date('Y-m-d H:i:s');
$product->updated_by = 1;
$product->save();

if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=accessory&sort=$sort&page=$j");
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
header("location:index.php?option=accessory&sort=$sort&page=$j");