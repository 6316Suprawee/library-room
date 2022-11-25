<?php include "connect.php" ?>
<html>
<head>
<link rel="stylesheet" href="checklogin.css">
</head>
<body>
<div class="head">
        <div class="brand">
            <img src="kmutnb.png" alt="photo">
        </div>

        <div class="kmutnb">
            <h2>KMUTNB</h2>
            <h5>King Mongkut's University of Technology North Bangkok</h5>
        </div>
  </div>
<div class='check'>
<?php session_start(); ?>
<?php
  $stmt = $pdo->prepare("SELECT * FROM student JOIN room JOIN bookdetail 
  ON bookdetail.room_code = room.room_code 
  JOIN bookorder 
  ON bookorder.book_id = bookdetail.book_id WHERE std_user = ? AND room.room_code=? AND bookdetail.date_chin = ? AND bookdetail.time_chin=?");
  $stmt->bindParam(1, $_GET["std_user"]);
  $stmt->bindParam(2, $_GET["room_code"]);
  $stmt->bindParam(3, $_GET["date_chin"]);
  $stmt->bindParam(4, $_GET["time_chin"]);
  
  $stmt->execute();
  $rows  = $stmt->fetch();
  
  $user = $rows["std_user"];
  $room =$rows["room_code"];
  $date = $rows["date_chin"];
  $time =$rows["time_chin"];
if ($rows['std_book'] <= 1 || $rows["book_status"] == "Yes")
{ 
  if($rows["book_status"] == "Yes"){
    echo "ห้อง".$rows["room_code"]."มีการจองแล้ว"."<br>";
    ?><a href="user-date.php?std_user=<?=$rows["std_user"]?>">กลับหน้าหลัก</a><?php
  }
  else{ 
    echo "<h2>จำนวนการจองครบแล้ว</h2>"."<br>";
   ?><a href="user-date.php?std_user=<?=$rows["std_user"]?>">กลับหน้าหลัก</a><?php
  }
}
if($rows['std_book'] > 0 && $rows["book_status"] == "No" && $rows["time_chin"] == "9.00-11.00" ){
$stmt = $pdo->prepare("UPDATE student SET std_book= std_book-1 , room_code = '$room' ,time_chin = '$time' WHERE std_user=?");
$stmt->bindParam(1, $_GET["std_user"]);
$stmt->execute();
$stmt = $pdo->prepare("UPDATE bookorder INNER JOIN bookdetail ON bookorder.book_id = bookdetail.book_id INNER JOIN room ON bookdetail.room_code = room.room_code
SET  count_book= count_book+1, book_status= 'Yes', book_cancel='' ,each_order=each_order+1 WHERE bookdetail.room_code LIKE '$room' AND bookdetail.time_chin LIKE '%9.00-11.00%' ");
$stmt->execute();
$rowr  = $stmt->fetch();
  $_SESSION["status"]=$rowr["book_status"];
  header("location: user-date.php?std_user=$user");
}
else if($rows['std_book'] > 0 && $rows["book_status"] == "No" && $rows["time_chin"] == "13.00-15.00"){
  $stmt = $pdo->prepare("UPDATE student SET std_book= std_book-1 , room_code = '$room' ,time_chin = '$time' WHERE std_user=?");
  $stmt->bindParam(1, $_GET["std_user"]);
  $stmt->execute();
  $stmt = $pdo->prepare("UPDATE bookorder INNER JOIN bookdetail ON bookorder.book_id = bookdetail.book_id INNER JOIN room ON bookdetail.room_code = room.room_code
  SET  count_book= count_book+1, book_status= 'Yes', book_cancel='' ,each_order=each_order+1 ,  WHERE bookdetail.room_code LIKE '$room' AND bookdetail.time_chin LIKE '%13.00-15.00%' ");
  $stmt->execute();
  $rowr  = $stmt->fetch();
    $_SESSION["status"]=$rowr["book_status"];
    header("location: user-date.php?std_user=$user");
  }
?>
</div>
</body>
</html>