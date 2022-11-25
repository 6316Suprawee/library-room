<?php include "connect.php" ?>
<html>
<head>
<link rel="stylesheet" href="canclebook.css">
</head>
<head>
    <meta charset="utf-8">
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
  $stmt = $pdo->prepare("SELECT * FROM student JOIN room JOIN bookdetail ON bookdetail.room_code = room.room_code JOIN bookorder 
  ON bookorder.book_id = bookdetail.book_id WHERE std_user=? AND room.room_code=? AND bookdetail.date_chin = ? AND bookdetail.time_chin=?");
  $stmt->bindParam(1, $_GET["std_user"]);
  $stmt->bindParam(2, $_GET["room_code"]);
  $stmt->bindParam(3, $_GET["date_chin"]);
  $stmt->bindParam(4, $_GET["time_chin"]);
  $stmt->execute();
  $row  = $stmt->fetch();
  $user = $row["std_user"];
  $room =$row["room_code"];
  $date = $row["date_chin"];
  $time =$row["room_code"];
if ($row['std_book'] >= 2)
{
  header("location: user-date.php?std_user=$user");
}
else{
  if($row['book_status']=='Yes')
  {
    $stmt = $pdo->prepare("UPDATE student SET std_book= std_book+1 ,room_code = '' ,time_chin = '' WHERE std_user=?");
    $stmt->bindParam(1, $_GET["std_user"]);
    $stmt->execute();

    if($row['time_chin']=='9.00-11.00')
    {
    $stmt = $pdo->prepare("UPDATE bookorder INNER JOIN bookdetail ON bookorder.book_id = bookdetail.book_id INNER JOIN room ON bookdetail.room_code = room.room_code
    SET count_cancel= count_cancel+1,
    each_cancel=each_cancel+1 ,
    book_cancel='Yes',
    book_status='No'
    WHERE room.room_code LIKE '%$room%' AND bookdetail.time_chin LIKE '%9.00-11.00%'");

    $stmt->execute();
    $rowr  = $stmt->fetch();
    }
    else if($row['time_chin']=='13.00-15.00')
    {
    $stmt = $pdo->prepare("UPDATE bookorder INNER JOIN bookdetail ON bookorder.book_id = bookdetail.book_id INNER JOIN room ON bookdetail.room_code = room.room_code
    SET count_cancel= count_cancel+1,each_cancel=each_cancel+1 ,book_cancel='Yes',book_status='No'WHERE room.room_code LIKE '%$room%'  AND bookdetail.time_chin LIKE '%13.00-15.00%'");
    $stmt->execute();
    $rowr  = $stmt->fetch();
    }
  
    $_SESSION["bookcancel"]=$rowr["book_cancel"];
    $_SESSION["bookstatus"]=$rowr["book_status"];
    header("location: user-date.php?std_user=$user");
  }
  
  else if($row['book_status']=='No' && $row['book_cancel']=='Yes'){
      echo "<h2>"."ไม่สามารถยกเลิกได้";
      echo "ห้อง".$row["room_code"]."ได้"."</h2>"."<br>";
      ?><a href="user-date.php?std_user=<?=$row["std_user"]?>">กลับหน้าหลัก</a><?php
  }

}

?>
</div>
</body>

</html>