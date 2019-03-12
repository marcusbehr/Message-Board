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
  <li><a href="LoadPosts.php">Load Posts</a></li>
 
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <div class="card">
    <div class="container">
         <form action="verifysignup.php" method="post">
    Username: &nbsp; &nbsp; &nbsp;<input type="text" name="username">
    Password: &nbsp;<input type="password" name="Password">
    First Name: &nbsp; &nbsp; &nbsp;<input type="text" name="fname">
    Last Name: &nbsp;<input type="text" name="lname">
   Email: &nbsp; &nbsp; &nbsp;<input type="text" name="email">

    <br>
        <input type="submit">
  </form>
  
  <?php 
  

  if (isset($_SESSION['errors'])){
      $errors = $_SESSION['errors'];
      
      foreach ($errors as $error){
          echo "<p>" . $error . "</p>";
      }
  }
  else{
      echo "Not here??";
  }
  
  
  ?>
    </div>
  </div>
</div>

</body>
</html>
