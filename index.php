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
    else if (isset($_SESSION['user']) ){
        
        $user = $_SESSION['user'];
        echo "Welcome back, " . $user . "<a href='logout.php'> Logout</a>";
    }
    
    
    ?>
  </div>
<ul>
  <li><a class="active" href="HomePage.php">Home</a></li>
  <li><a href="UploadPage.php">Upload</a></li>
  <li><a href="LoadPosts.php">Load Posts</a></li>
  <li><a href="archivedPost.php">Archived Posts</a></li>
  <li><a href="Users">Users</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <div class="card">
    <div class="container">
      <h4><b>Home</b></h4>
      <p>Hello, this blog was made for CSCI 2006 as a final project using elements of php and mysql.<br>
      The purpose of the blog is to allow a user to post a short message in the posts page for the world to see.<br>
      You can post as anyone you'd like as the author field in the upload post page is open to edit.<br>
      Just remember to be yourself and have fun. <br>
      <b>Project creators: </b><br>
      <i>Marcus Behr</i><br>
      <i>Justin Pham</i></p>
    </div>
  </div>
</div>

</body>
</html>
