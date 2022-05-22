<?php
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
        $_SESSION['user_address']= $row["user_address"];
        $_SESSION['phone_number']= $row["phone_number"];
        $_SESSION['person_name']= $row["person_name"];
        $_SESSION['displayed_pic']= $row["displayed_pic"];
    }
} else {
echo "0 results";
}
?>
