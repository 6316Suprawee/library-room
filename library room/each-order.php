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
    <link rel="stylesheet" href="styleroomall.css">
</head>
<body>
<nav>
    <div class="brand">
        <img src="kmutnb.png">
    </div>
    <h1 id="fullname">สวัสดี <?=$_SESSION["fullname"]?></h1>
    <div class="glub">
        <a href="roomall.php">กลับไปหน้าหลัก</a>
    </div>
    <div class="logout">
        <a href='logout.php'>ออกจากระบบ</a><br>
    </div>
    
    <div class="link">
    <a href="see-alleach.php?keyword1=room_code&keyword2=">ค้นหาห้อง</a>
    </div>
</nav>
<h2 title="details">รายละเอียดการจองในแต่ละวัน</h2> 
<?php
$stmt = $pdo->prepare("SELECT room.room_code,bookorder.book_cancel,bookorder.book_status,bookdetail.date_chin,bookdetail.time_chin
,room.count_cancel,room.count_book,bookdetail.each_order,
bookdetail.each_cancel
FROM bookorder
INNER JOIN bookdetail
ON bookorder.book_id = bookdetail.book_id
INNER JOIN room
ON bookdetail.room_code = room.room_code
WHERE bookdetail.rid not like '%0%'");
$stmt->execute();
echo"<div class='tb'>";
echo"<table border='1'>";
echo "<tr>";
echo "<th>"; echo "วันที่ " ; echo "</th>"; 
echo "<th>"; echo "เวลา " ; echo "</th>"; 
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
    <td><?=$rowr["date_chin"]?></td>
    <td><?=$rowr["time_chin"]?></td>
    <td><?=$rowr["room_code"]?></td>
    <td><?=$rowr["each_order"]?></td>
    <td><?=$rowr["each_cancel"]?></td>
    </tr>
    <?php
}
echo"</table>";
echo"<div>";
?>

<?php
?>

<br>
</body>
</html>
