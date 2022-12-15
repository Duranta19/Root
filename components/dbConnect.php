<?php
    $conn = mysqli_connect('localhost', 'root', '', 'mohajon');
    if(!$conn){
        echo "Connection error" . mysqli_connect_error();
    }
?>