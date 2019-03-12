<?php
session_start();
include 'DBHELPER.PHP';



$titleTxt = $_POST['title'];
$blogPostTxt = $_POST['blogPost'];
$authorTxt = $_POST['author'];
$username = $_SESSION['user'];




$sql = "INSERT into posts (author, blogposts, title, username) values ('$authorTxt', '$blogPostTxt','$titleTxt', '$username')";


if (mysqli_query($link, $sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error ";
}

//$toWrite = $authorTxt . "@@@" . $titleTxt . "@@@" . $blogPostTxt;
//$postTextFile = fopen($fileID . ".txt", "w+") or die(" cannot open file! ");
//echo "<p>" . $titleTxt . $blogPostTxt . "</p>";



//fwrite($postTextFile, $toWrite);

header('Location: LoadPosts.php');
?>
