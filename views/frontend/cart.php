<?php
use App\Models\Product;
$id=$_REQUEST['id'];
$product=Product::find($id);
function checkCart($cart,$id){
    $check=0;$carts=[];
    foreach($cart as $cat ){
        if($cat['id']==$id){
            return true;
        }
    }
    return false;
}
function cartUpdate($carts,$id){
    foreach($carts as $key=> $cat ){
        if($cat['id']==$id){
            $carts[$key]['qty']+=1;
            $carts[$key]['total']=$carts[$key]['price']*$carts[$key]['qty'];
            break;
        }
    }
    return $carts;
}
$number=1;
$cart_item=[
    'id'=>$product->id,
    'img'=>$product->image,
    'name'=>$product->name,
    'price'=>$product->price,
    'qty'=>1,
    'slug'=>$product->slug,
    'total'=>$product->price,
];
// unset($_SESSION['cart_items']);
if(isset($_SESSION['cart_items']))
{
    $carts=$_SESSION['cart_items'];
    if(checkCart($carts,$id)==true){
        $carts=cartUpdate($carts,$id);
    }
    else{
        $carts[]=$cart_item;
    }
    $_SESSION['cart_items']=$carts;

}
else{
    $cart[]=$cart_item;
    $_SESSION['cart_items']=$cart;
    
}
$url= $_SESSION['url'];
unset($_SESSION['url']);
header('location:'.$url);
echo "<pre>";
print_r($_SESSION['cart_items']);
echo "</pre>";
