<?php
use App\Models\Topic;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];

$topic = Topic::find($id);
if($topic == null)
{
    header("location:index.php?option=topic&page=$j&cat=recycle");
}
$topic->status = 2;
$topic->updated_at = date('Y-m-d H:i:s');
$topic->updated_by = 1;
$topic->save();
header("location:index.php?option=topic&cat=recycle&page=$j");