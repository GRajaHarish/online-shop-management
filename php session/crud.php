<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$conn = new mysqli("localhost", "root", "", "shop");

class shop{
 public $shop_code;
 public $shop_incharge;
 public $shop_name;
}
$shopobj =new shop;
$shopobj->shop_code= $_POST["shop_code"];
$shopobj->shop_incharge = $_POST["incharge"];  
$shopobj->shop_name = $_POST["shop_name"];

if(isset($_POST["insert"]))
{validate($shopobj);}
 
if(isset($_POST["delete"]))
 { delete($shopobj);}
if(isset($_POST["update"]))
{ update( $shopobj);}
}
 function validate($shopobj)
{
  if(empty($shopobj->shop_name)&&empty($shopobj->shop_incharge)&&empty($shopobj->shop_name))
  {
         
    $_SESSION["message"] =" please enter all the fields";
  
     }
  else
  { insert($shopobj); }

}


  function insert($shopobj)
 {
  global $conn;
  $sql = "INSERT INTO registration VALUES('$shopobj->shop_code','$shopobj->shop_name',  '$shopobj->shop_incharge')";
  if ($conn->query($sql)==TRUE)
  { echo "Inserted Sussfully"; }
  else 
  {  echo "Inserted not Sussfully";}
    header("location: shop.php");
  }  
   function delete($shopobj)

  {  
            global   $conn;
            $sql = "DELETE FROM registration WHERE shop_code= '$shopobj->shop_code'";
            if ($conn->query($sql)==TRUE){
            
              header("location: shop.php");
            }
            else {echo "Error : " . $conn->error;}
   }
    function update($shopobj)
   {
            global   $conn;
            $sql = "UPDATE registration set incharge = '$shopobj->shop_incharge' where shop_code = '$shopobj->shop_code'";
            if ($conn->query($sql)==TRUE){
             header("location: shop.php");
            } 
    }   
?>