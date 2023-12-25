<?php
use App\Models\Category;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$category = Category::find($id);
if($category == null)
{
    header("location:index.php?option=category&cat=recycle&sort=$sort&page=$j");
}

$category->delete();
header("location:index.php?option=category&cat=recycle&sort=$sort&page=$j");