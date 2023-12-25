<?php
use App\Models\Slider;

$sort = $_REQUEST['sort']??'';
$id = $_REQUEST['id']??'';
$j = $_REQUEST['page']??'';
$slider = Slider::find($id);

if($slider == null)
{
    header("location:index.php?option=slider&sort=$sort&page=$j");
}
$slider->status = ($slider->status == 1) ? 2 : 1;
$slider->updated_at = date('Y-m-d H:i:s');
$slider->updated_by = 1;
$slider->save();

if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=slider");
    exit;
}
header("location:index.php?option=slider&sort=$sort&page=$j");