<?php
    // Attempt insert query execution
$sql = "SELECT * FROM tblproduct WHERE brand = 'asus'";
$result = $link->query($sql);
if(!mysqli_query($link, $sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
if ($result->num_rows > 0) {
    // output data of each row
    $rowcount=mysqli_num_rows($result);
    $_SESSION['asus'] = $rowcount; 
} else {
echo "0 results";
}
    // Attempt insert query execution
    $sql2 = "SELECT * FROM tblproduct WHERE brand = 'acer'";
    $result = $link->query($sql2);
    if(!mysqli_query($link, $sql2)){
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    if ($result->num_rows > 0) {
        // output data of each row
        $rowcount=mysqli_num_rows($result);
        $_SESSION['acer'] = $rowcount; 
    } else {
    echo "0 results";
    }
    // Attempt insert query execution
    $sql3 = "SELECT * FROM tblproduct WHERE brand = 'dell'";
    $result = $link->query($sql3);
    if(!mysqli_query($link, $sql3)){
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    if ($result->num_rows > 0) {
        // output data of each row
        $rowcount=mysqli_num_rows($result);
        $_SESSION['dell'] = $rowcount; 
    } else {
    echo "0 results";
    }
    // Attempt insert query execution
    $sql4 = "SELECT * FROM tblproduct WHERE brand = 'hp'";
    $result = $link->query($sql4);
    if(!mysqli_query($link, $sql4)){
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    if ($result->num_rows > 0) {
        // output data of each row
        $rowcount=mysqli_num_rows($result);
        $_SESSION['hp'] = $rowcount; 
    } else {
    echo "0 results";
    }
    // Attempt insert query execution
    $sql5 = "SELECT * FROM tblproduct WHERE brand = 'lenovo'";
    $result = $link->query($sql5);
    if(!mysqli_query($link, $sql5)){
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    if ($result->num_rows > 0) {
        // output data of each row
        $rowcount=mysqli_num_rows($result);
        $_SESSION['lenovo'] = $rowcount; 
    } else {
    echo "0 results";
    }
?>
