<?php
use App\Models\Order;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];

$order = Order::find($id);
if($order == null)
{
    header("location:index.php?option=order&page=$j&cat=recycle");
}
$order->status = 2;
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by = 1;
$order->save();
header("location:index.php?option=order&cat=recycle&page=$j");