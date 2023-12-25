<?php 
$carts=$_SESSION['cart_items'];
$value=[];
foreach($carts as $key=> $cart){
    if($cart['id']==$_REQUEST['id']){
        if($cart['qty']>1){
            $cart['qty']-=1;
            $catrs[$key]=$cart;
            $_SESSION['cart_items'][$key]=$catrs[$key];
        }
        else{
            unset($_SESSION['cart_items'][$key]);
        }
    }
}
if(count($_SESSION['cart_items'])==0){
    unset($_SESSION['cart_items']);
}
$url= $_SESSION['url'];
unset($_SESSION['url']);
header('location:'.$url);