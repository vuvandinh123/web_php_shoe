<?php
use App\Models\Menu;

$sort = $_REQUEST['sort']??'';
$id = $_REQUEST['id']??'';
$j = $_REQUEST['page']??'';
$menu = Menu::find($id);

if($menu == null)
{
    header("location:index.php?option=menu&sort=$sort&page=$j");
}
$menu->status = ($menu->status == 1) ? 2 : 1;
$menu->updated_at = date('Y-m-d H:i:s');
$menu->updated_by = 1;
$menu->save();

if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=menu");
    exit;
}
header("location:index.php?option=menu&sort=$sort&page=$j");