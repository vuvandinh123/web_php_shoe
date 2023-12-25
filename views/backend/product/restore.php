<?php
use App\Models\Product;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];

$product = Product::find($id);
if($product == null)
{
    header("location:index.php?option=product&page=$j&cat=recycle");
}
$product->status = 2;
$product->updated_at = date('Y-m-d H:i:s');
$product->updated_by = 1;
$product->save();
header("location:index.php?option=product&cat=recycle&page=$j");