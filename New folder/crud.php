<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$conn = new mysqli("localhost", "root", "", "shop");
$shop_code = $_POST["shop_code"];
$incharge = $_POST["incharge"];  
$shop_name= $_POST["shop_name"];
if(isset($_POST["insert"]))
  { insert($shop_code,$shop_name,$incharge); }
if(isset($_POST["delete"]))
 { delete($shop_code);}
if(isset($_POST["update"]))
{ update( $shop_code,$incharge);}

}

  function insert($shop_code,$shop_name,  $incharge)
 {
  global $conn;
  $sql = "INSERT INTO registration VALUES('$shop_code','$shop_name',  '$incharge')";
  if ($conn->query($sql)==TRUE)
  { echo "Inserted Sussfully"; }
  else 
  {  echo "Inserted not Sussfully";}
    header("location: shop.php");
  }  
   function delete($shop_code)

  {  
            global   $conn;
            $sql = "DELETE FROM registration WHERE shop_code= '$shop_code'";
            if ($conn->query($sql)==TRUE){
              echo "Deleted Successfully";
              header("location: shop.php");
            }
            else {echo "Error : " . $conn->error;}
   }
    function update($shop_code,$incharge)
   {
            global   $conn;
            $sql = "UPDATE registration set incharge = '$incharge' where shop_code = '$shop_code'";
            if ($conn->query($sql)==TRUE){
             header("location: shop.php");
            } 
    }   
?>