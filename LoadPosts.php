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
  <li><a href="#about">About</a></li>
</ul>

<div style="margin-left:25%;height:1000px;">
  <div class="card">


    <div >
<?php 
$posts = mysqli_query($link, "SELECT * FROM posts");
echo "<h1>Message Board</h1>";
echo "<table border = '1'>";

if (isset($_SESSION['user'])){

    $username = $_SESSION['user'];
    while ($row = mysqli_fetch_array($posts)){
    echo "<tr>
<th>Post Number</th>
<th>Author</th>
<th>Date & Time</th>
</tr>";

    echo "<tr><td>". $row['id'] . "</td>" .
        "<td>" . $row['author'] . "</td>" .
        "<td>" . $row['reg_date'] . "</td></tr>" .

        "<tr><td colspan='3'>" . $row['blogposts'] . "</td></tr>";
    
    echo "<tr><td><a href='removepost.php?id=" . $row['id'] . "'>Remove post</a></td>
<td><a href='archivepost.php?id=" . $row['id'] . "'>Archive post</a></td><td><a href='userinfo.php?id=" . $row['username'] .  "'>User info</a></td></tr>";

}
}
else{
    while ($row = mysqli_fetch_array($posts)){
        echo "<tr>
<th>Post Number</th>
<th>Author</th>
<th>Date & Time</th>
</tr>";
        
        echo "<tr><td>". $row['id'] . "</td>" .
            "<td>" . $row['author'] . "</td>" .
            "<td>" . $row['reg_date'] . "</td></tr>" .
            
            "<tr><td colspan='3'>" . $row['blogposts'] . "</td></tr>";
        
        echo "<tr><td colspan='3'><a href='login.php'>Login</a> to remove posts, archive posts, and get user Info</td></tr>";
    }}
echo "</table>";
?>

    </div>
  </div>
</div>


</body>
</html>


</body>
</html> -->
