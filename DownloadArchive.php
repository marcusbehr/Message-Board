<?php
//include "archivedPost.php";

//$toWrite = $authorTxt . "@@@" . $titleTxt . "@@@" . $blogPostTxt;
//$postTextFile = fopen($fileID . ".txt", "w+") or die(" cannot open file! ");
//echo "<p>" . $titleTxt . $blogPostTxt . "</p>";
$fileName = "Archive.txt";
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-type: application/txt");
readfile("Archive.txt");

header('Location: archivedpost.php');


?>
