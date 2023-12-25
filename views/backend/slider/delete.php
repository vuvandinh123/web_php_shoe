<?php
use App\Models\Slider;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$slider = Slider::find($id);
if($slider == null)
{
    header("location:index.php?option=slider&sort=$sort&page=$j");
}
$slider->status =0;
$slider->updated_at = date('Y-m-d H:i:s');
$slider->updated_by = 1;
$slider->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=slider");
    exit;
}
header("location:index.php?option=slider&sort=$sort&page=$j");