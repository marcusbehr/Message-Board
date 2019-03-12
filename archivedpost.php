<?php
// $postID = "0";
// $post;
// $myfile = fopen($postID . ".txt", "r") or die("cant open");
// echo fread($myfile, filesize($postID . ".txt"));
// $post = file_get_contents($postID . ".txt");
// echo $post;
// print_r (explode("@@@", $post));
session_start();
include 'DBHELPER.PHP';
include 'nav.php';


?>


<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <a href="#default" class="logo">Blog It </a>
        <?php 
    
    if (!isset($_SESSION['user'])){
        echo "Welcome, you are not logged in!" . 
            "<a href='login.php'>Login</a><a href='signup.php'>Sign up</a>";
    }
    else if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
        
        $user = $_SESSION['user'];
        echo "Welcome back, " . $user . "<a href='logout.php'> Logout</a>";
    }
    
    
    ?>
  </div>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="UploadPage.php">Upload</a></li>
  <li><a href="LoadPosts.php">Load Posts</a></li>
  <li><a href="archivedPost.php">Archived Posts</a></li>
  <li><a href="Users">Users</a></li>
</ul>

<div style="margin-left:25%;height:1000px;">
  <div class="card">


    <div >
<?php 

if(isset($_SESSION['user']) && isset($_SESSION['archiveList'])){
$archiveList = $_SESSION['archiveList'];

echo "<h1>Archive</h1>";
echo "<table border = '1'>";

for ($i=0,$r=0; $i < sizeof($archiveList); $i++, $r++){
    echo "<tr>
<th>Post Number</th>
<th>Author</th>
<th>Date & Time</th>
</tr>";

    echo "<tr><td>". $archiveList[$i][3] . "</td>" .
        "<td>" . $archiveList[$i][0] . "</td>" .
        "<td>" . $archiveList[$i][2] . "</td></tr>" .

        "<tr><td colspan='3'>" . $archiveList[$i][1] . "</td></tr>";
    



}

$archiveFile = fopen("Archive.txt", "w") or die("unable to open file");

for ($i=0,$r=0; $i < sizeof($archiveList); $i++, $r++){
    fwrite($archiveFile, $archiveList[$i][0]);
    fwrite($archiveFile, $archiveList[$i][1]);
    fwrite($archiveFile, $archiveList[$i][2]);
    fwrite($archiveFile, "\n");
    
}

fclose($archiveFile);



echo "</table>";
echo "<a href = 'DownloadArchive.php'>Download Archive</a>";
}

else{
    echo "<h1>Archive</h1>";
    echo "<p style='align:center'>You must <a href='login.php'>Login</a> to archive posts</p>
                <p style='align:center'>Not a user? <a href='signup.php'>Sign up</a></a>";
}

?>


    </div>
  </div>
</div>


</body>
</html>


</body>
</html> -->
