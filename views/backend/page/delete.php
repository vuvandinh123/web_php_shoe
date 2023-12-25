<?php
use App\Models\Post;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$post = Post::find($id);
if($post == null)
{
    header("location:index.php?option=post&sort=$sort&page=$j");
}
$post->status =0;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = 1;
$post->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=post");
    exit;
}
header("location:index.php?option=post&sort=$sort&page=$j");