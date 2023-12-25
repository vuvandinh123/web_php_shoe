<?php
use App\Models\User;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$user = User::find($id);
if($user == null)
{
    header("location:index.php?option=user&sort=$sort&page=$j");
}
$user->status =0;
$user->updated_at = date('Y-m-d H:i:s');
$user->updated_by = 1;
$user->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=user");
    exit;
}
header("location:index.php?option=user&sort=$sort&page=$j");