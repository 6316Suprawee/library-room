<?php session_start(); ?>
<?php include "connect.php" ?>
<?php
    $sql = "SELECT * FROM bookdetail";
    $results  = $mysql->query($sql);
    while($bookdetail = $results->fecth_assoc()){
        $bookdetails[] = $bookdetail; 
    }
    $encoded_data = json_encode($bookdetails,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents('data.json',$encoded_data);

?>
