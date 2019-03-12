<?php 
session_start();
include 'DBHELPER.php';


$username = $_POST['username'];
$password = $_POST['Password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];

$username = strtolower($username);

$usernameSearch = mysqli_query($link, "SELECT * FROM users WHERE username='$username'");

while($row = mysqli_fetch_array($usernameSearch)){
    $usernameResults = $row['username'];
}

echo $usernameResults;
verify($username, $password, $fname, $lname, $email, $usernameResults);
echo $usernameResults . "<br>" . $username . "<br>";


function verify($username, $password, $fname, $lname, $email, $usernameResults){
    
    $usernameValid = false;
    $passwordValid = false;
    $fnameValid = false;
    $lnameValid = false;
    $emailValid = false;
    
    $errors = array();
    $errorIndex = 0;
    
    //validate all the fields, change their values to true if they've been validated
    $emailPattern = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i';
    
    if((strlen($username) < 30 && strlen($username) > 8 &&($username != (string)$usernameResults))){
        $usernameValid = true;
    }
    else if ($username == $usernameResults){
        $errors[$errorIndex] = "Username Already Taken";
    }
    else{
        $errors[$errorIndex] = "Your Username must be less than 30 characters and greater than 8 characters";
        $errorIndex++;
    }
    
    
    
    if(strlen($fname)<30 && strlen($fname) > 8){
        $fnameValid = true;
    }
    else {
        $errors[$errorIndex] = "Your First Name must be less than 30 characters and greater than 8 characters";
        $errorIndex++;
    }
    
    if(strlen($lname)<30 && strlen($lname) > 8){
        $lnameValid = true;
    }
    else {
        $errors[$errorIndex] = "Your Last Name must be less than 30 characters and greater than 8 characters";
        $errorIndex++;
    }
    
    
    if(strlen($password)>8){
        $passwordValid = true;
    }
    else {
        $errors[$errorIndex] = "Your Password Must be greater than 8 characters";
        $errorIndex++;
    }
    
    if(preg_match($emailPattern,$email)){
        $emailValid = true;
    }
    
    else{
        $errors[$errorIndex] = "Your Email is invalid";
    }
    
    //add errors to session array
    $_SESSION['errors'] = $errors;
    
    foreach ($errors as $error){
        echo $error;
    }
    
    
    
    if ($username == true && $password == true && $fname == true && $lname == true&& $email== true){
        addUser($username, $password, $fname, $lname, $email);
    }
    else{
      header('Location: signup.php');
      
        
    }
}

function addUser($username, $password, $fname, $lname, $email){
    include 'DBHELPER.php';
    $sql = "INSERT into users (username, fname, lname, password, email) values ('$username', '$fname','$lname', '$password','$email')";
    
    if (mysqli_query($link, $sql) === TRUE) {
        $_SESSION['user'] = $username;
        header('Location:loadposts.php');
    } else {
        echo "Error ";
    }
    
    
}

?>