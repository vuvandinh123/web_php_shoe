<?php
use App\Models\Slider;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];

$slider = Slider::find($id);
if($slider == null)
{
    header("location:index.php?option=slider&page=$j&cat=recycle");
}
$slider->status = 2;
$slider->updated_at = date('Y-m-d H:i:s');
$slider->updated_by = 1;
$slider->save();
header("location:index.php?option=slider&cat=recycle&page=$j");