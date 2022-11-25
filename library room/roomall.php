<?php session_start(); ?>
<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM student JOIN room JOIN bookdetail ON bookdetail.room_code = room.room_code JOIN bookorder ON bookorder.book_id = bookdetail.book_id WHERE std_user=? ");
    $stmt->bindParam(1, $_GET["std_user"]);;
    $stmt->execute();
    $rows = $stmt->fetch();
?>
<html>
<head>
<link rel="stylesheet" href="roomallmobile.css">
<link rel="stylesheet" href="roombutton.css">   
    
</head>
<body>

<nav>
    <div class="brand">
        <img src="kmutnb.png">
    </div>
        <h5 id="fullname">สวัสดี <?=$_SESSION["fullname"]?></h5>

    <div class="logout">
        <a href='logout.php'>ออกจากระบบ</a><br>
    </div>
</nav>
<h2 title="details">รายละเอียดการจองห้องทั้งหมด</h2> 
<?php
$stmt = $pdo->prepare("SELECT room.room_code,bookorder.book_cancel,bookorder.book_status,bookdetail.date_chin,bookdetail.time_chin
,room.count_cancel,room.count_book,bookdetail.each_order,
bookdetail.each_cancel
FROM bookorder
INNER JOIN bookdetail
ON bookorder.book_id = bookdetail.book_id
INNER JOIN room
ON bookdetail.room_code = room.room_code
GROUP BY bookdetail.room_code");
$stmt->execute();
echo"<div class='tb'>";
echo"<table border='1'>";
echo "<tr>";
echo "<th>"; echo "ห้อง " ; echo "</th>"; 
echo "<th>"; echo "จำนวนการจองห้อง"; echo "</th>";
echo "<th>"; echo "จำนวนยกเลิกการจองห้อง"; echo "</th>";
echo "</tr>";
while ($rowr = $stmt->fetch())
{
    $_SESSION["bookcancel"]=$rowr["book_cancel"];
    $_SESSION["bookstatus"]=$rowr["book_status"];
    ?>
    <tr>
    <td><?=$rowr["room_code"]?></td>
    <td><?=$rowr["count_book"]?></td>
    <td><?=$rowr["count_cancel"]?></td>
    </tr>
    <?php
}
echo"</table>";
echo"<div>";
?>
<br>
<div class="button">
    <button class="button1" onclick="document.location='check-duplicate.php'">ตั้งค่าการเลือกห้อง</button>
    <button class="button2" onclick="document.location='each-order.php'">ดูการเลือกห้องแต่ละวัน</button>
    <button class="button3" onclick="document.location='create-json-file.php'">ดูประวัติการเลือกห้อง</button>
</div>
</body>
</html>
