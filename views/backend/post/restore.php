<?php
use App\Models\Post;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];

$post = Post::find($id);
if($post == null)
{
    header("location:index.php?option=post&page=$j&cat=recycle");
}
$post->status = 2;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = 1;
$post->save();
header("location:index.php?option=post&cat=recycle&page=$j");