<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
?>
<?php 
$link = mysqli_connect("localhost", "root", "", "data");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(!empty($_SESSION["username"])){$username= $_SESSION["username"];}else{$username="";};
// Attempt insert query execution
$sql = "SELECT * FROM tblproduct WHERE customer= '$username'";
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
  <link rel="stylesheet" href="css/cart.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
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
    <center>
    <form method='post' action='check.php'> 
    <div class="container" style=" background-color:whitesmoke; height:100%; padding:10px; margin-top: 150px;">
    <script>
    $(document).ready(function() {
    $('#select-all').click(function() {
        var checked = this.checked;
        $('input[type="checkbox"]').each(function() {
        this.checked = checked;
    });
    })
    });
    </script>
    <div class="row">
        <div class="col-sm-4">
            <div style="margin-right:10px; padding-top:6px;">
                <input type='checkbox' id='select-all' name='select-all' value="select-all" style='height: 20px;
                width: 20px; margin-right: 10px; '>
                <label class="navtext">SELECT ALL</label>
            </div>
        </div>
        <div class="col-sm">

        </div>
    </div>
    <?php 
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
                        
                        $id = $row["product_id_number"];
                    echo "
        <div class='row shadow p-4 mb-4 bg-white' style='margin:10px;'>
            <div class='col-sm-2'>
                <div class='row'>
                    <div class='col-sm' style='height: 33px;width: auto;'>
                    </div>
                </div>
                <div class='row'>
                <div class='col-sm'>
                    <input type='checkbox' id='checkbox[]' name='checkbox[]' value=".$id." style='height: 20px;
                    width: 20px;'>
                </div>
                </div>
                <div class='row'>
                    <div class='col-sm' style='height: 33px;width: auto;'>
                    </div>
                </div>
            </div>
            <div class='col-sm'>
            <img class='laptopimage' src=".'"'.$row["product_image"].'"'." 
            style='max-width: 100px; height: auto;'>
            </div>
            <div class='col-sm-8'>
            <button class='submit'name='laptopname' type='submit' value=".$id.">
                <p class='laptopname'>".$row['product_name']."</p>
            </button><br>
            <b class='price' style='float:left;'>".$row['price']."</b>
            </div>
        </div>
        ";
        }
        } else {
        echo "0 results";
        } 
        ?>
        <div class="row">
            <div class="col-sm-3">
                <label class=""><button type="submit" class="btn btn-primary" name="checkout" id="checkout" value="checkout">Check Out</button></label>
                <label class=""><button type="submit" class="btn btn-primary" name="delete" id="delete" value="delete">delete</button></label>
            </div>
            <div class="col-sm-9">
                            
            </div>
        </div>      
    </div>
    </form> 
    </center>
</body>
</html>
<?php
// Close connection
mysqli_close($link);
?>