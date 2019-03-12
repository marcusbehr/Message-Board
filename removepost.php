<?php 
session_start();
include 'DBHELPER.php';


$delete = $_GET['id'];

$sql = "DELETE FROM posts WHERE id=$delete";

if (mysqli_query($link, $sql) === TRUE) {
   header('Location: loadposts.php');
} else {
    echo "Error ";
}

?>