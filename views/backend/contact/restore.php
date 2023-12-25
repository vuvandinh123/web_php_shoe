<?php
use App\Models\Contact;
$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];

$contact = Contact::find($id);
if($contact == null)
{
    header("location:index.php?option=contact&page=$j&cat=recycle");
}
$contact->status = 2;
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by = 1;
$contact->save();
header("location:index.php?option=contact&cat=recycle&page=$j");