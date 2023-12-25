<?php
use App\Models\Order;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$order = Order::find($id);
if($order == null)
{
    header("location:index.php?option=order&cat=recycle&page=$j");
}

$order->delete();
header("location:index.php?option=order&cat=recycle&page=$j");