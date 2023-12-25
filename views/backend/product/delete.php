<?php
use App\Models\Product;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$product = Product::find($id);
if($product == null)
{
    header("location:index.php?option=product&sort=$sort&page=$j");
}
$product->status =0;
$product->updated_at = date('Y-m-d H:i:s');
$product->updated_by = 1;
$product->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=product");
    exit;
}
MyClass::set_flash('message',['type'=>'alert-success','msg'=>'Thêm vào thùng rác thành công']);
header("location:index.php?option=product&sort=$sort&page=$j");