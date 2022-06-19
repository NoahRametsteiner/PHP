<?php
  require_once("headerinclude.php");
  require_once("product.class.php");

  $myProduct=new Product("Apple",3900);
  //$myProduct=new Product("Apple");
  //$myProduct=new Product();



  //$myProduct=new Product();
  //$myProduct=new Product();
  //$myProduct->setPrice(1219.3);
  //$myProduct->setName("HP Firefly 15 G7");

  echo $myProduct->getName();
  echo $myProduct->getPrice();

  unset ($myProduct);





  require_once("footinclude.php");
?>
