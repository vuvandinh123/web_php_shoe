<?php
use App\Models\Banner;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$banner = Banner::find($id);
if($banner == null)
{
    header("location:index.php?option=banner&sort=$sort&page=$j");
}
$banner->status =0;
$banner->updated_at = date('Y-m-d H:i:s');
$banner->updated_by = 1;
$banner->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=banner");
    exit;
}
header("location:index.php?option=banner&sort=$sort&page=$j");