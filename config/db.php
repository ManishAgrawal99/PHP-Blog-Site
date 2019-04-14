<?php
    //Connect to MySQL
    $conn = mysqli_connect('localhost', 'root', '', 'phpblog');

    //Check Connection
    if(mysqli_connect_errno()){
        //Connection Failed
        echo "Connection Failed ". mysqli_connect_errno();
    }

?>