<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
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
    require_once "AddOns/retrieve_info.php";
    require_once "AddOns/retrieve_product_available.php";
// Attempt insert query execution
$sql2 = "SELECT * FROM tblproduct WHERE brand IS NOT NULL ORDER BY RAND()";
$result = $link->query($sql2);
if(!mysqli_query($link, $sql2)){
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
  <link rel="stylesheet" href="css/index.css">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
</head>
<body>
<?php require_once "AddOns/navbar.php"; ?>
        <div class="container" style="margin-top: 150px;">
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
                    </button></div></form>
                    </div>
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
</body>
</html>

