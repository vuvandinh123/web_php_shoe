<?php
use App\Models\Post;

$id = $_REQUEST['id'];
$j = $_REQUEST['page'];
$post = Post::find($id);
if($post == null)
{
    header("location:index.php?option=page&cat=recycle&page=$j");
}

$post->delete();
header("location:index.php?option=page&cat=recyclepage=$j");