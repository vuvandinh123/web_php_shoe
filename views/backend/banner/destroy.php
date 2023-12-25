<?php
use App\Models\Banner;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$banner = Banner::find($id);
if($banner == null)
{
    header("location:index.php?option=banner&cat=recycle&sort=$sort&page=$j");
}

$banner->delete();
header("location:index.php?option=banner&cat=recycle&sort=$sort&page=$j");