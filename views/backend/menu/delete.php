<?php
use App\Models\Menu;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$menu = Menu::find($id);
if($menu == null)
{
    header("location:index.php?option=menu&sort=$sort&page=$j");
}
$menu->status =0;
$menu->updated_at = date('Y-m-d H:i:s');
$menu->updated_by = 1;
$menu->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=menu");
    exit;
}
header("location:index.php?option=menu&sort=$sort&page=$j");