<?php
// Initialize the session
session_start();
?>
<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "data");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
function read_more($string)
    {
      // strip tags to avoid breaking any html
        $string = strip_tags($string);
        if (strlen($string) > 40) {

            // truncate string
            $stringCut = substr($string, 0, 40);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }
if(!empty($_POST['searchbar'])){}
else{if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}else{header("location: home.php");
    exit;}}
if(isset($_POST["search"])){$product_name = $_POST["search"];}else{
    echo "<script type='text/javascript'>alert('Plase enter your query!')</script>";
}
// Attempt insert query execution
$sql = "SELECT * FROM tblproduct WHERE brand IS NOT NULL AND product_name LIKE '%$product_name%' OR brand LIKE '%$product_name%'";
$result = $link->query($sql);
if(!mysqli_query($link, $sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Labtech_hub</title>
  <link rel="icon" href="admin/image/LOGO.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/categorizelaptop.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>

  <style>
      .tableFixHead {
        overflow-y: auto;
        height: 300px;
      }
      .tableFixHead thead th {
        position: sticky;
        top: 0;
      }
      table {
        border-collapse: collapse;
        width: 100%;
      }
      th {
        background: #eee;
        text-align: center;
      }
    </style>
</head>
<body>
<?php require_once "AddOns/navbar.php"; ?>
    <div class="row" style="margin-top: 150px;">
        <div class="col-sm-3">
            <div class="tableFixHead">
            <table>
                    <thead>
                    <tr>
                        <th>Product Brands</th>
                    </tr>
                    </thead>
                    <tbody>
                    <style>
                    button {
                        border: none;
                        background-color: white;
                        text-align: center;
                    }
                    
                    button:focus {
                        border: none;
                        outline: none;
                    }
                    
                    button:focus{
                        outline:none;
                    }
                    </style>
                    <form method='post' action='categorizelaptop.php'>
                    <tr>
                        <td><button class='submit'name='submit' type='submit' value="asus"><img class="imagelogo" src="admin/image/asus-logo.png" alt="">
                        <span class="logoname">ASUS</span></button></td>
                    </tr>
                    <tr>
                        <td><button class='submit'name='submit' type='submit' value="acer"><img class="imagelogo" src="admin/image/acer-logo.png" alt="">
                        <span class="logoname">ACER</span></button></td>
                    </tr>
                    <tr>
                        <td><button class='submit'name='submit' type='submit' value="dell"><img class="imagelogo" src="admin/image/dell-logo.png" alt="">
                        <span class="logoname">DELL</span></button></td>
                    </tr>
                    <tr>
                        <td><button class='submit'name='submit' type='submit' value="hp"><img class="imagelogo" src="admin/image/hp-logo.png" alt="">
                        <span class="logoname">HP</span></button></td>
                    </tr>
                    <tr>
                        <td><button class='submit'name='submit' type='submit' value="lenovo"><img class="imagelogo" src="admin/image/lenovo-logo.png" alt="">
                        <span class="logoname">LENOVO</span></button></td>
                    </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-9 laptopview container">
        <div class='row'>
                <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "
                    <style>
                    button {
                        max-width: 100%;
                        height: auto;
                        border: none;
                        background-color: white;    
                    }
                    
                    button:focus {
                        border: none;
                        outline: none;
                    }
                    
                    button:focus{
                        outline:none;
                    }
                    </style>
                    <div class='col-sm-3'>
                    <div class='row'>
                    <div class='col-sm' style='height: 250px;'>
                    <form method='post' action='laptop.php'>
                    <center><img class='laptopimage' src=".'"'.$row["product_image"].'"'." 
                    style=' max-width: 200px;
                    height: auto; padding-left: 10px; padding-right: 10px;'></center><br>
                    <button class='submit'name='submit' type='submit' value=".$row['id'].">
                    <h4 class='laptopname'>".read_more($row['product_name'])."</h4>
                    </button></div>
                    </div>
                    </form>
                    <div class='row'>
                    <div class='col-sm' style='padding-top:10px; padding-bottom:10px;'>
                            <b class='price'>".$row['price']."</b>
                            <center><div class='buycart'>
                            <form method='post' action='check.php'>
                            <button class='btn btn-info btn-lg' name='checkout' id='checkout' type='submit' value=".$row['id'].">
                            <span class='glyphicon'></span> BUY NOW
                            </button>
                            <button class='btn btn-info btn-lg' name='cart' id='cart' type='submit' value=".$row['id'].">
                            <span class='glyphicon glyphicon-shopping-cart'></span>
                            </button>
                            </form>
                            </div></center>
                            
                        </div></div></div>";
                    }
                        } else {
                        echo "0 results";
                    } 
                    ?> 
                        
                </div>
        </div>
        </div>
        <?php
if(!empty($_POST["cart"])){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "data");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id = $_POST["cart"];
if(!empty($_SESSION["username"])){$username= $_SESSION["username"];}else{$username="unregisted";};
// Attempt insert query execution
$sql = "INSERT INTO tblproduct(product_image, product_name, price, customer,product_id_number) SELECT product_image, product_name, price, '$username', '$id' FROM tblproduct WHERE id='$id'";
if(mysqli_query($link, $sql)){
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
}
?>
</body>
</html>
