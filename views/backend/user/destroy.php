<?php
use App\Models\User;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$user = User::find($id);
if($user == null)
{
    header("location:index.php?option=user&cat=recycle&page=$j");
}

$user->delete();
header("location:index.php?option=user&cat=recycle&page=$j");