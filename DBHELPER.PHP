<?php
define("DB_SERVER", "localhost");
define("DB_USERNAME", "MarcusBehr");
define("DB_PASSWORD", "jackbauer");
define("DB_NAME", "postDB");

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    echo "connected";
}

?>
