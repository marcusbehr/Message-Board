<?php
include 'DBHELPER.php';

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
        echo "Welcome back, " . $user;
    }
    
    
    ?>
  </div>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="UploadPage.php">Upload</a></li>
  <li><a href="archivedpost.php">Archived Posts</a></li>
  
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <div class="card">
    <div class="container">
         <form action="verifylogin.php" id="userlogin" method="post">
    Username: &nbsp; &nbsp; &nbsp;<input type="text" name="username">
    Password: &nbsp;<input type="password" name="Password">

   

    
        <input type="submit">
  </form>
    </div>
  </div>
</div>

</body>
</html>
