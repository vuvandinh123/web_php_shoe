<?php
use App\Models\Banner;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];

$banner = Banner::find($id);
if($banner == null)
{
    header("location:index.php?option=banner&page=$j&cat=recycle");
}
$banner->status = 2;
$banner->updated_at = date('Y-m-d H:i:s');
$banner->updated_by = 1;
$banner->save();
header("location:index.php?option=banner&cat=recycle&page=$j");