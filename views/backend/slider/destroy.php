<?php
use App\Models\Slider;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$slider = Slider::find($id);
if($slider == null)
{
    header("location:index.php?option=slider&cat=recycle&sort=$sort&page=$j");
}

$slider->delete();
header("location:index.php?option=slider&cat=recycle&sort=$sort&page=$j");