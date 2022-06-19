<?php
  class Product{
    private $price;
    private $name;

    function __construct(){
      if(func_num_args() == 1){
        $this->name=func_get_arg(0);
        $this->price=0;
      }else if(func_num_args() == 2){
        $this->name=func_get_arg(0);
        $this->price=func_get_arg(1);
      }
    }

    function __destruct(){
      echo "test";
    }

    public function getPrice(){
      return $this->price;
    }
    public function getName(){
      return $this->name;
    }

    public function setPrice($p){
      $this->price=$p;
    }
    public function setName($n){
      $this->name=$n;
    }














  }
?>
