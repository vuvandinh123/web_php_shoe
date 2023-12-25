<?php
use App\Models\Menu;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];

$menu = Menu::find($id);
if($menu == null)
{
    header("location:index.php?option=menu&page=$j&cat=recycle");
}
$menu->status = 2;
$menu->updated_at = date('Y-m-d H:i:s');
$menu->updated_by = 1;
$menu->save();
header("location:index.php?option=menu&cat=recycle&page=$j");