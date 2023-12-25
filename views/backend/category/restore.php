<?php
use App\Models\Category;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];

$category = Category::find($id);
if($category == null)
{
    header("location:index.php?option=category&sort=$sort&page=$j&cat=recycle");
}
$category->status = 2;
$category->updated_at = date('Y-m-d H:i:s');
$category->updated_by = 1;
$category->save();
header("location:index.php?option=category&cat=recycle&sort=$sort&page=$j");