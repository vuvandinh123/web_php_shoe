<?php
use App\Models\Contact;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$contact = Contact::find($id);
if($contact == null)
{
    header("location:index.php?option=contact&sort=$sort&page=$j");
}
$contact->status =0;
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by = 1;
$contact->save();
if($sort==''||$id==''||$j=='')
{
    header("location:index.php?option=contact");
    exit;
}
header("location:index.php?option=contact&sort=$sort&page=$j");