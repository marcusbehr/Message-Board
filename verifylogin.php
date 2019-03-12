<?php 
session_start();
include 'DBHELPER.php';
$username = $_POST['username'];
$password = $_POST['Password'];

$username = strtolower($username);
$usernameRetrieve = mysqli_query($link, "SELECT * FROM users WHERE username='$username'");

while($row = mysqli_fetch_array($usernameRetrieve)){
    $usernameFound = $row['username'];
    $passwordFound = $row['password'];
}

if (($username == $usernameFound) && ($password == $passwordFound)){
    header('Location: uploadpage.php');
    $_SESSION['user'] = $username;
}
else {
    echo "wrong credentials";
    echo "<a href='login.php'>Return to Login page</a>";
}



?>