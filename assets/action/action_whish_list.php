<?php

//action.php

session_start();

if(isset($_POST["action"]))
{
 if($_POST["action"] == "add")
 {
  if(isset($_SESSION["wish_list_cart"]))
  {
   $is_available = 0;
   foreach($_SESSION["wish_list_cart"] as $keys => $values)
   {
    if($_SESSION["wish_list_cart"][$keys]['product_id'] == $_POST["product_id"])
    {
     $is_available++;
	 if(isset($_POST['actionnew']) && $_POST['actionnew'] == 'update'){
		 $_SESSION["wish_list_cart"][$keys]['product_quantity'] = $_POST["product_quantity"];
	 }else{
		 //$_SESSION["wish_list_cart"][$keys]['product_quantity'] = $_SESSION["wish_list_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
	 }
     
    }
   }
   if($is_available == 0)
   {
    $item_array = array(
     'product_id'               =>     $_POST["product_id"],  
     'product_name'             =>     $_POST["product_name"],  
     'product_price'            =>     $_POST["product_price"],  
     'product_quantity'         =>     $_POST["product_quantity"]
    );
    $_SESSION["wish_list_cart"][] = $item_array;
    $fanz_wish_list_cart = serialize($item_array);
    //$_COOKIE["fanz_wish_list_cart"][] = $item_array;
    setcookie('fanz_wish_list_cart', $fanz_wish_list_cart);
   }
  }
  else
  {
   $item_array = array(
    'product_id'               =>     $_POST["product_id"],  
    'product_name'             =>     $_POST["product_name"],  
    'product_price'            =>     $_POST["product_price"],  
    'product_quantity'         =>     $_POST["product_quantity"]
   );
   $_SESSION["wish_list_cart"][] = $item_array;
   $fanz_wish_list_cart = serialize($item_array);
   //$_COOKIE["fanz_wish_list_cart"][] = $item_array;
   
  }
 }


 if($_POST["action"] == 'remove')
 {
  foreach($_SESSION["wish_list_cart"] as $keys => $values)
  {
   if($values["product_id"] == $_POST["product_id"])
   {
    unset($_SESSION["wish_list_cart"][$keys]);
   }
  }
 }
 if($_POST["action"] == 'empty')
 {
  unset($_SESSION["wish_list_cart"]);
 }
 
}
?>