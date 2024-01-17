<?php

//action.php

session_start();

if(isset($_POST["action"]))
{
 	  foreach($_SESSION["wish_list_cart"] as $keys1 => $values1)
	  {
		 echo $_SESSION["wish_list_cart"][$keys1]; 
	   if($values1["product_id"] == $_POST["product_id"])
	   {
		unset($_SESSION["wish_list_cart"][$keys1]);
		var_dump($_POST['product_id']);
	   }
	  }	
	  //var_dump($_SESSION["wish_list_cart"]);
 if($_POST["action"] == "add")
 {
  if(isset($_SESSION["shopping_cart"]))
  {
  
   $is_available = 0;
   foreach($_SESSION["shopping_cart"] as $keys => $values)
   {
    if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])
    {
     $is_available++;
	 if(isset($_POST['actionnew']) && $_POST['actionnew'] == 'update'){
		 $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_POST["product_quantity"];
	 }else{
		 $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
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
    $_SESSION["shopping_cart"][] = $item_array;
    //$fanz_shopping_cart = serialize($item_array);
    //$_COOKIE["fanz_shopping_cart"][] = $item_array;
    //setcookie('fanz_shopping_cart', $fanz_shopping_cart);
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
   $_SESSION["shopping_cart"][] = $item_array;
   //$fanz_shopping_cart = serialize($item_array);
   //$_COOKIE["fanz_shopping_cart"][] = $item_array;
   
  }
  
	 
 }


 
}
?>