<?php
session_start();
if(!empty($_POST["delete"])){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "data");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$id = $_POST["checkbox"];
for($i=0;$i<count($id);$i++){ 
// Attempt insert query execution
$sql = "DELETE FROM tblproduct WHERE product_id_number= '$id[$i]'";
if(mysqli_query($link, $sql)){
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
mysqli_close($link);
}
?>

<?php
if(!empty($_POST["checkout"])){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "data");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(!empty($_POST["checkbox"])){
    $id = $_POST["checkbox"];
}elseif(empty($_POST["checkbox"])){$id[] = $_POST["checkout"];}
// Attempt insert query execution
for($i=0;$i<count($id);$i++){ 
$sql = "INSERT INTO tblproduct (product_image,product_name, product_description, price, customer, product_status)
SELECT product_image, product_name, product_description, price, customer, 'checkout' FROM tblproduct WHERE id = '$id[$i]';"; 
if(mysqli_query($link, $sql)){
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
for($i=0;$i<count($id);$i++){ 
$sql2 = "DELETE FROM tblproduct WHERE product_id_number IN (SELECT product_id_number FROM tblproduct WHERE product_id_number = '$id[$i]')";
if(mysqli_query($link, $sql2)){
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
header("location: checkout.php");
// Close connection
mysqli_close($link);
}
?>

<?php 
if(!empty($_POST['laptopname'])){
    $_SESSION['laptopname'] = $_POST['laptopname'];
    header("location: laptop.php");
    exit; 
}
?>

<?php
if(!empty($_POST["Order"])){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "data");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(!isset($_SESSION['method'])){
    echo '<script>alert("You forget to select you payment method!")</script>';
    echo "<script>setTimeout(\"location.href = 'checkout.php';\",1500);</script>";
    exit;
}
// Attempt insert query execution
$sql = "INSERT INTO tblproduct (product_image,product_name, product_description, price, customer, product_status, payment_method, shippingfee)
SELECT product_image, product_name, product_description, price, customer, 'parcel', '$_SESSION[method]', '$_SESSION[shipping]' FROM tblproduct WHERE product_status = 'checkout';"; 
if(mysqli_query($link, $sql)){
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sql2 = "DELETE FROM tblproduct WHERE product_status= 'checkout'";
if(mysqli_query($link, $sql2)){
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header("location: home.php");
// Close connection
mysqli_close($link);
}
?>

<?php
if(!empty($_POST["cancel"])){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "data");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "DELETE FROM tblproduct WHERE product_status= 'checkout'";
if(mysqli_query($link, $sql)){
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header("location: home.php");
// Close connection
mysqli_close($link);
}
?>
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
if(!empty($_SESSION["username"])){$username= $_SESSION["username"];}else{$username="";};
// Attempt insert query execution
$sql = "INSERT INTO tblproduct(product_image, product_name, price, customer, product_id_number) SELECT product_image, product_name, price, '$username', '$id' FROM tblproduct WHERE id='$id'";
if(mysqli_query($link, $sql)){
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
// Close connection
mysqli_close($link);
}
?>

<?php
if(isset($_POST['upload'])){
    $currentDirectory = getcwd();
    $uploadDirectory = "/image/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $file_Extension = explode('.',$fileName);
    $fileExtension = end($file_Extension);

    $uploadPath = $currentDirectory ."/admin". $uploadDirectory . basename($fileName);
    $path = $uploadDirectory . basename($fileName); 

    if (isset($_POST['upload'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
        }
      }
    }
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "data");

$imgpath = "admin".$path;

// Attempt insert query execution
$sql = "UPDATE users SET displayed_pic = '$imgpath' WHERE username = '$_SESSION[username]'";
if(mysqli_query($link, $sql)){
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
header("location: account.php");
// Close connection
mysqli_close($link);
}
if(!empty($_POST['personalInfo'])){
if(!empty($_POST['Name'])&&!empty($_POST['Email'])&&!empty($_POST['Phone_Number'])
&&!empty($_POST['Gender'])&&!empty($_POST['birthday'])&&!empty($_POST['user_address'])){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "data");
 
if(empty($_POST['Shop_Name'])){$shop="";}else{$shop = $_POST['Shop_Name'];}
if(empty($path)){$path="";}   
$Name = mysqli_real_escape_string($link, $_POST['Name']);
$Email = mysqli_real_escape_string($link, $_POST['Email']);
$Phone_Number = mysqli_real_escape_string($link, $_POST['Phone_Number']);
$Shop_Name = $shop;
$Gender = mysqli_real_escape_string($link, $_POST['Gender']);
$birthday = mysqli_real_escape_string($link, $_POST['birthday']);
$address = mysqli_real_escape_string($link, $_POST['user_address']);
// Attempt insert query execution
$sql = "UPDATE users SET person_name= '$Name',email= '$Email',user_address= '$address',phone_number='$Phone_Number', shop_name= '$Shop_Name', gender= '$Gender', birthdate= '$birthday' 
WHERE username = '$_SESSION[username]'";
if(mysqli_query($link, $sql)){
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
}
header("location: account.php");
}
?>
<?php
if(!empty($_POST['cod'])){
    $_SESSION['method'] = $_POST['cod'];
    $_SESSION['shipping'] = "₱ 300";
    header("location: checkout.php");
}elseif(!empty($_POST['gcash'])){
    $_SESSION['method'] = $_POST['gcash'];
    $_SESSION['shipping'] = "₱ 200";
    header("location: checkout.php");
}elseif(!empty($_POST['credit'])){
    $_SESSION['method'] = $_POST['credit'];
    $_SESSION['shipping'] = "₱ 250";
    header("location: checkout.php");
}
?>