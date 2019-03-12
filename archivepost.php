<?php 
session_start();
include 'DBHELPER.php';

$archiveId = $_GET['id'];

$posts = mysqli_query($link, "SELECT * FROM posts WHERE id=$archiveId");

if (isset($_SESSION['archiveList'])){
$archiveIndex = $_SESSION['archiveIndex'];
$archiveList = $_SESSION['archiveList'];

while($row = mysqli_fetch_array($posts)){
    $theAuthor = $row['author'];
    $theBlogpost = $row['blogposts'];
    $theDate = $row['reg_date'];
    $theID = $row['id'];
    $theTitle = $row['title'];
}
    
    $archiveList[$archiveIndex][0] = $theAuthor;
    $archiveList[$archiveIndex][1] = $theBlogpost;
    $archiveList[$archiveIndex][2] = $theDate;
    $archiveList[$archiveIndex][3] = $archiveId;
    
    
    $archiveIndex++;
    
    $_SESSION['archiveList'] = $archiveList;
    $_SESSION['archiveIndex'] = $archiveIndex;
    
   // echo $theAuthor . $theBlogpost . $theDate;
    //to do:
    //save all this to a session array named archived array, use pa5 to get details on this
    //do the same with the user info session array
    //need to not allow users to post or load posts when they're not logged in
    //need to do validation for password and email - less than 8 characters
    //POSSIBLY turn something into a file that is downloaded

header('Location: archivedpost.php');
}

else {
    $archiveIndex = 0;
    
    while($row = mysqli_fetch_array($posts)){
        $theAuthor = $row['author'];
        $theBlogpost = $row['blogposts'];
        $theDate = $row['reg_date'];
        
    }
        $archiveList= array(array());
        $archiveList[$archiveIndex][0] = $theAuthor;
        $archiveList[$archiveIndex][1] = $theBlogpost;
        $archiveList[$archiveIndex][2] = $theDate;
        $archiveList[$archiveIndex][3] = $archiveId;
        
        $archiveIndex++;
        
        $_SESSION['archiveList'] = $archiveList;
        $_SESSION['archiveIndex'] = $archiveIndex;
        
        header('Location: archivedpost.php');
        
        //echo $theAuthor . $theBlogpost . $theDate;
        //to do:
        //save all this to a session array named archived array, use pa5 to get details on this
        //do the same with the user info session array
        //need to not allow users to post when they're not logged in
        //need to do validation for password - less than 8 characters
        //POSSIBLY turn something into a file that is downloaded
    
}

for ($i=0,$r=0; $i < sizeof($archiveList); $i++, $r++){
    
    echo $archiveList[$i][0] . $archiveList[$i][1] . $archiveList[$i][2] . $archiveList[$i][3];
}
?>