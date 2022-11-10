<?php include 'crud.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="CSS/shop.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
 
    <script type="text/javascript" src="shop.js"></script>
    <script>
     </script>
</head>
<body>
<center>  <div class="alert alert-success">
        <?php 
           if(isset($_SESSION["message"])){
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
            }?>
        </div>
        
    <div class="container">
    <div class="card HAS">
      <div class="card-header"> <h5 style="color:rgb(10, 10, 9);">REGISTRATION</h5></div>
        <div class="card-body ">
       
          <form action="shop.php" id="form" method="post" name="form">
            <?php  $s_codeer=$s_nameer=$shop_incharger=""; ?>
            <input id="shop_code" placeholder="shop code" type="text"  value="" name="shop_code">
            <span class="error"> <?php echo $s_codeer;?></span><br>   <br>
            <input id="shop_name" placeholder="shop name"type="text" value="" name="shop_name">
            <span class="error"> <?php echo $s_nameer;?></span> <br>   <br>
            <input id="incharge" placeholder="shop_incharge"  type="text" value="" name="incharge">
            <span class="error"> <?php echo  $shop_incharger;?></span><br>    
            <br>
            <input id="save" type="submit" value="Save" name="" >
            <input id="clear" type="submit" value="Clear" name="clear"   onclick =" return clears()">
            <input type="hidden"  id="action" name="insert"  value="" >
           </form>
           <br>
         </div>
    <div id="table">
       <table class="table table-striped table-hover table-primary"> 
            <tr>
                <th>Sl</th>
                <th>shop code</th>
                <th>shop name</th>
                <th>incharge</th>
                <th>&nbsp; &nbsp;  Select</th>
            </tr>      
            <tbody>
     <?php
       $conn = new mysqli("localhost", "root", "", "shop");
       
        if($conn->connect_error)
        {
            die("Error : ". $conn->connect_error);
        }
        $slno = 1;
        $sql = "SELECT * FROM registration ORDER BY shop_code";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){ 
        while ($row = $result->fetch_assoc()){
            echo"
        <tr>
            <td> $slno </td>
            <td> $row[shop_code]</td>
            <td>  $row[shop_name] </td>
            <td> $row[incharge] </td>
            <td>
              <a onclick='onEdit(this)'  class='btn btn-primary btn-sm' >Edit</a>
              <a onclick='onDelete(this)' class='btn btn-primary btn-sm' >Delete</a>
            </td>
        </tr>";
            $slno++;
        } 
        }
        else{
        echo "No Record Found";
        }
        ?>
        