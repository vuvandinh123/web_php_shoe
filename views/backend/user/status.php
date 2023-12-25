<?php
use App\Models\User;

$sort = $_REQUEST['sort'];
$id = $_REQUEST['id'];
$j = $_REQUEST['page'];
$user = User::find($id);
if($user == null)
{
    header("location:index.php?option=user&sort=$sort&page=$j");
}
$user->status = ($user->status == 1) ? 2 : 1;
$user->updated_at = date('Y-m-d H:i:s');
$user->updated_by = 1;
$user->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=user");
    exit;
}
header("location:index.php?option=user&sort=$sort&page=$j");