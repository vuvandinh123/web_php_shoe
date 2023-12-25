<?php
use App\Models\Post;

$sort = $_REQUEST['sort'];
$id = $_REQUEST['id'];
$j = $_REQUEST['page'];
$page = Post::find($id);
if($post == null)
{
    header("location:index.php?option=page&sort=$sort&page=$j");
}
$page->status = ($page->status == 1) ? 2 : 1;
$page->updated_at = date('Y-m-d H:i:s');
$page->updated_by = 1;
$page->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=page");
    exit;
}
header("location:index.php?option=page&sort=$sort&page=$j");