<?php

$connect = mysqli_connect("localhost","root","","library room");
$file_name = 'data.json';
$data = file_get_contents($file_name);
$array = json_decode($data, true);
foreach($array as $row)
{
    if($row["std_book"] == 0){
        $sql = "INSERT INTO history(std_user,std_name,std_book,std_pass,room_code,time_chin) 
    
        VALUES ('".$row["std_user"]."','".$row["std_name"]."','".$row["std_book"]."','".$row["std_pass"]."','".$row["room_code"]."','".$row["time_chin"]."')";
        
        mysqli_query($connect,$sql);
    
    }
    else{
        echo '';
    }
}   
echo 'DATA INSERTED';
     header("location: user-history.php");
     

   
?>