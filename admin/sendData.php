<?php
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

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
    $path = $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
        }
      }
    }
?>

<?php
if(!empty($path)&&!empty($_POST['pname'])&&!empty($_POST['pdescrip'])&&!empty($_POST['price'])){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "data");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$brand_name = mysqli_real_escape_string($link, $_POST['brand_name']);  
$imgpath = "admin".$path;
$pname = mysqli_real_escape_string($link, $_POST['pname']);
$pdescrip = mysqli_real_escape_string($link, $_POST['pdescrip']);
$price = mysqli_real_escape_string($link, $_POST['price']);
// Attempt insert query execution
$sql = "INSERT INTO tblproduct (brand,product_image,product_name, product_description, price) VALUES ('$brand_name','$imgpath','$pname', '$pdescrip', '$price')";
if(mysqli_query($link, $sql)){
    echo "<br> It has been recorded. Success! <br><a href='uploadData.php'>Upload Again?</a>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
?>