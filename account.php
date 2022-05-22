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
$username= $_SESSION["username"];
// Attempt insert query execution
$sql = "SELECT * FROM users WHERE username= '$username'";
$result = $link->query($sql);
if(!mysqli_query($link, $sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
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
            <div class="row" style="margin-top: 150px;">
                <div class="col-sm-3" style=" padding-left:20px;">
                <?php require_once "AddOns/account_option.php"; ?>
                </div>
                <div class="col-sm-9">
                <form method="post" action="check.php" enctype="multipart/form-data">
                    <div class="container" style="background-color: whitesmoke;  height: 100%; width: 90%; padding-bottom:10px;">
                    <h4><b>My Profile</b></h4>
                    <p>Manage and protect your account</p>
                    <div style="border: 1px solid grey; border-top:none; border-left:none; border-right:none; padding-top:10px; padding-bottom:20px;"></div>
                    <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                            <div class="col-sm-8" >
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="float-right">Username</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <b><?php echo htmlspecialchars($_SESSION["username"]);?></b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="float-right">Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $row["person_name"]; ?>" name="Name" 
                                        style="color: black; text-transform:capitalize; border: none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="float-right">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control border-top-0" value="<?php echo $row["email"];?>" name="Email"
                                        style="color: black; width:fit-content; background-color: whitesmoke; border: none; outline:none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="float-right">Phone Number</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $row["phone_number"]; ?>" name="Phone_Number"style="color: black; ">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="float-right" style="width:fit-content;">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $row["user_address"]; ?>" name="user_address"style="color: black; text-transform:capitalize;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="float-right" style="width:fit-content;">Shop Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $row["shop_name"];?>" name="Shop_Name"style="color: black;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="float-right">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <div class="form-check-inline">
                                        <?php $gender =$row['gender'];?>
                                        <p class="form-check-label" for="radio1">
                                            <?php if($gender == 'Male'){
                                            echo "<input type='radio' class='form-check-input' id='radio1' name='Gender' value='Male' checked>";
                                            }elseif($gender != 'Male'){echo "<input type='radio' class='form-check-input' id='radio1' name='Gender' value='Male'>";}
                                            ?>
                                            Male
                                        </p>
                                        </div>
                                        <div class="form-check-inline">
                                        <p class="form-check-label" for="radio2">
                                            <?php if($gender == 'Female'){
                                            echo "<input type='radio' class='form-check-input' id='radio1' name='Gender' value='Female' checked>";
                                            }else{echo "<input type='radio' class='form-check-input' id='radio1' name='Gender' value='Female'>";}
                                            ?>
                                            Female
                                        </p>
                                        </div>
                                        <div class="form-check-inline">
                                        <p class="form-check-label" for="radio2">
                                            <?php if($gender == 'Other'){
                                            echo "<input type='radio' class='form-check-input' id='radio1' name='Gender' value='Other' checked>";
                                            }else{echo "<input type='radio' class='form-check-input' id='radio1' name='Gender' value='Other'>";}
                                            ?>Other
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="float-right">Date Of Birth</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="date" id="birthday" name="birthday" value="<?php echo date($row['birthdate']); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            <center>
                            <img src="<?php if($row["displayed_pic"] == "admin/image/"){echo "admin/image/temp_profile.png";}
                            else{echo $row["displayed_pic"];};?>" class="rounded-circle" style="max-width: 220px; height:220px; border-radius: 100%; border:1px solid grey;">
    
                            </center>
                            <div class="container">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-left: 70px;">
                                    Upload profile
                                </button>

                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Upload profile</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        <input type="file" name="the_file" id="fileToUpload" 
                                        style="background-color:whitesmoke;"></input>
                                        </div>
                                        <span><button type="upload" class="btn btn-primary" value="Upload Image" name="upload" style="margin: 20px;">Save</button></span>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                                
                                </div>
                                                
                            </div>
                           
                    </div>
                            <div class="row">
                                    <div class="col-sm-2">
                                        <label class="float-right"><button type="personalInfo" class="btn btn-primary" value="personalInfo" name="personalInfo">Save</button></label>
                                            
                                    </div>
                                    <div class="col-sm-10">
                                        
                                    </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
</body>
<?php
}
} else {
echo "0 results";
}
// Close connection
mysqli_close($link);
?>

