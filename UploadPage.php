
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <a href="#default" class="logo">Blog It </a>
        <?php
        session_start();
    
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


    <div class="container">
    
    <?php 
    
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
  echo "<h1>Upload Post</h1>";
        echo" <h2>  Submit your post: </h2>
      <form action='UploadPost.php' id='usrform' method='post'>
    Title: &nbsp; &nbsp; &nbsp;<input type='text' name='title'>
    Author: &nbsp;<input type='text' name='author'>

    <textarea name='blogPost' placeholder='Enter Post Here...' rows='15' cols='75' ></textarea>
    <br>
        <input type='submit'>
        </form>";
    }
    else{
        echo "<h1>Upload Post</h1>";
        echo "<p style='align:center'>You must <a href='login.php'>Login</a> to make posts</p>
                <p style='align:center'>Not a user? <a href='signup.php'>Sign up</a></a>";
    }
  ?>
  <br>


    </div>
  </div>
</div>


</body>
</html>
