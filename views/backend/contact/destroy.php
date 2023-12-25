<?php
use App\Models\Contact;

$id = $_REQUEST['id'];

$sort = $_REQUEST['sort'];
$j = $_REQUEST['page'];
$contact = Contact::find($id);
if($contact == null)
{
    header("location:index.php?option=contact&cat=recycle&sort=$sort&page=$j");
}

$contact->delete();
header("location:index.php?option=contact&cat=recycle&sort=$sort&page=$j");