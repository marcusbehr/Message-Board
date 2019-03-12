<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <a href="#default" class="logo">Blog It </a>
    <?php 
    session_start();
    include 'DBHELPER.php';
  
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
      <?php 
      if(isset($_GET['id'])){
//send the username through $_SERVER['username']
          $requestedUser = $_GET['id'];
          $selectedUser = mysqli_query($link, "SELECT * FROM users WHERE username='$requestedUser'");
          
          while($row = mysqli_fetch_array($selectedUser)){
              $username = $row['username'];
              $fname = $row['fname'];
              $lname = $row['lname'];
              $email = $row['email'];
          }
          
          echo "<h1>User Info<h1>";
            echo "<table>
               <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                </tr>
                <tr>
                    <tr><td>" . $username . "</td>
                    <td>" . $fname . "</td>
                    <td>" . $lname . "</td>
                    <td>" . $email . "</td></tr></table>";
          
          
      }
      else{
          echo "NO USERS SELECTED!";
      }
      ?>
    </div>
  </div>
</div>

</body>
</html>
