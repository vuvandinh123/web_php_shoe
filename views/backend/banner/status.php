<?php
use App\Models\Banner;

$sort = $_REQUEST['sort']??'';
$id = $_REQUEST['id']??'';
$j = $_REQUEST['page']??'';
$banner = Banner::find($id);

if($banner == null)
{
    header("location:index.php?option=banner&sort=$sort&page=$j");
}
$banner->status = ($banner->status == 1) ? 2 : 1;
$banner->updated_at = date('Y-m-d H:i:s');
$banner->updated_by = 1;
$banner->save();

if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=banner");
    exit;
}
header("location:index.php?option=banner&sort=$sort&page=$j");