<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$link = mysqli_connect("localhost", "root", "", "data");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt insert query execution
$sql = "SELECT * FROM tblproduct WHERE product_status='parcel'";
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
  <link rel="stylesheet" href="css/account.css">
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
            <style>
                .col-sm-3,
                .col-sm-9{
                    margin-bottom: 30px;
                }

            </style>
            <div style="margin-top: 150px;">
            <div class="container shadow p-4 mb-4 bg-white" style="background-color: whitesmoke; margin-bottom: 10px;">
            <h4 style="font-size:xx-large; color:grey;">Purchases</h4>
            </div>
            <?php 
            $sumup = 0;
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
            ?>
            <div class="container shadow p-4 mb-4 bg-white" style="background-color: whitesmoke; margin-bottom: 10px;">
                    <h6 style="font-size:large; margin-bottom:10px;">Product Ordered [Pending]</h6>
                    <div class="row" style="padding-left: 80px; margin-right: 20px;">
                        <div class="col-sm-3">
                        <center>
                        <?php echo "<img class='laptopimage' src=".'"'.$row["product_image"].'"'." style='max-width: 100px; height: auto;'>";?>
                        </center>
                        </div>
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-sm">
                                <form action='laptop.php'>     
                                <?php $id = $row["product_id_number"];
                                echo " <button class='laptopname' name='laptopname' type='submit' value=".$id.">
                                    <p class='laptopname ' style='text-align:left;'>".$row['product_name']."</p>
                                </button>"; $_SESSION['laptopname'] = $row["id"];?>
                                </form>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-sm">
                                    <h6 style="padding-left: 5px;">Payment Method: <span><?php echo $row["payment_method"];?></span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                        <table>
                            <tr>
                                <td><p>Merchandise Subtotal:</p></td>
                                <td><?php echo "<b class='price'>".$row['price']."</b>";?></td>
                            </tr>
                            <tr>
                                <td><p>Shipping Total:</p></td>
                                <td><b><?php echo $shipping = $row['shippingfee'];;
                                ?></b></td>
                            </tr>
                            <tr>
                                <td><p>Total Payment:</p></td>
                                <td><b><?php $shippingfee = preg_replace('/[^0-9.]+/', '', $shipping);
                                $price = preg_replace('/[^0-9.]+/', '', $row['price']);
                                $total = $shippingfee + $price;
                                $temp = number_format($total, 2, '.', ',');
                                echo "₱ $temp";
                                $sumup +=$total;
                                ?></b></td>
                            </tr>
                        </table>
                        </div>
                    </div>
            </div>
            <?php 
                    }
                } else {
                echo "<center><p>0 results</p></center>";
                }
            ?>
            <div class="container shadow p-4 mb-4 bg-white" style="background-color: whitesmoke; margin-bottom: 10px;">
                    <div class="row" style="padding-left: 80px; margin-right: 20px;">
                        <div class="col-sm-7">

                        </div>
                        <div class="col-sm-5">
                        <table>
                            <tr>
                                <td><p>Total Payment:</p></td>
                                <td><b><?php
                                $sumup = number_format($sumup, 2, '.', ',');
                                echo "₱ $sumup";
                                ?></b></td>
                            </tr>
                        </table>
                        </div>
                    </div>
            </div>
            <div class="container shadow p-4 mb-4 bg-white" style="background-color: whitesmoke; margin-bottom: 10px;">
            </div>
            </div>
</body>
</html>
