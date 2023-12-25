<?php
use App\Models\Product;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$product = Product::find($id);
if($product == null)
{
    header("location:index.php?option=product&cat=recycle&page=$j");
}

$product->delete();
header("location:index.php?option=product&cat=recycle&page=$j");