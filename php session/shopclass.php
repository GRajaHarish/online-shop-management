<?php
class shop{
public $shop_code;
public $shop_incharge;
public $shop_name;
}
$shopobj =new shop;
$shopobj->shop_code= $_POST["shop_code"];
$shopobj->shop_incharge = $_POST["incharge"];  
$shopobj->shop_name = $_POST["shop_name"];

?>