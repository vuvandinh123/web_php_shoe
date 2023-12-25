<?php
use App\Models\Topic;

$sort = $_REQUEST['sort'];
$id = $_REQUEST['id'];
$j = $_REQUEST['page'];
$topic = Topic::find($id);
if($topic == null)
{
    header("location:index.php?option=topic&sort=$sort&page=$j");
}
$topic->status = ($topic->status == 1) ? 2 : 1;
$topic->updated_at = date('Y-m-d H:i:s');
$topic->updated_by = 1;
$topic->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=topic");
    exit;
}
header("location:index.php?option=topic&sort=$sort&page=$j");