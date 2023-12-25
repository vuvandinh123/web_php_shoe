<?php
use App\Models\Order;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$order = Order::find($id);
if($order == null)
{
    header("location:index.php?option=order&sort=$sort&page=$j");
}
$order->status =0;
$order->updated_at = date('Y-m-d H:i:s');
$order->updated_by = 1;
$order->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=order");
    exit;
}
header("location:index.php?option=order&sort=$sort&page=$j");