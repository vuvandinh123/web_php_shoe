<?php
use App\Models\Post;

$sort = $_REQUEST['sort'];
$id = $_REQUEST['id'];
$j = $_REQUEST['page'];
$post = Post::find($id);
if($post == null)
{
    header("location:index.php?option=post&sort=$sort&page=$j");
}
$post->status = ($post->status == 1) ? 2 : 1;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = 1;
$post->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=post");
    exit;
}
header("location:index.php?option=post&sort=$sort&page=$j");