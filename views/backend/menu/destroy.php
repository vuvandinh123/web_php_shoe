<?php
use App\Models\Menu;

$id = $_REQUEST['id'];
$j = $_REQUEST['page'];
$menu = Menu::find($id);
if($menu == null)
{
    header("location:index.php?option=menu&cat=recycle&page=$j");
}

$menu->delete();
header("location:index.php?option=menu&cat=recycle&page=$j");