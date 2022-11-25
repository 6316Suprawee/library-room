<?php 
    $connect = mysqli_connect("localhost","root","","library room");

    if(!$connect){
        echo "Failed".mysqli_connect_error();
    }
?>