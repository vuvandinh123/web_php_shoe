<?php
use App\Models\Topic;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$topic = Topic::find($id);
if($topic == null)
{
    header("location:index.php?option=topic&cat=recycle&page=$j");
}

$topic->delete();
header("location:index.php?option=topic&cat=recycle&page=$j");