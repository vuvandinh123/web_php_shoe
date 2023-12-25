<?php
use App\Models\Order;

$sort = $_REQUEST['sort'];
$id = $_REQUEST['id'];
$j = $_REQUEST['page'];
$order = Order::find($id);
if($order == null)
{
    header("location:index.php?option=order&sort=$sort&page=$j");
}
$order->status = ($order->status == 1) ? 2 : 1;
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by = 1;
$order->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=order");
    exit;
}
header("location:index.php?option=order&sort=$sort&page=$j");