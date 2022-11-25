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
<link rel="stylesheet" href="seeall.css">   
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
    
</nav>
<div class="select"  align="center">
<form>
<label><b><br>Room</b>
            <select name="keyword1" id = "room_code">
                <option value="room_code">----select----</option>
                <option value="701" >R1|701</option>
                <option value="702" >R2|702</option>
                <option value="703" >R3|703</option>
                <option value="704" >R4|704</option>
            </select>
</label>
<input type="date" name = keyword2  id = "date_chin">
<input type="submit" value="ค้นหา" class="addjong">
</form>
<h2 title="details">รายละเอียด</h2> 
</div>
<?php
?>

<?php
$stmt = $pdo->prepare("SELECT room.room_code,
bookorder.book_cancel,
bookorder.book_status,
bookdetail.date_chin,
bookdetail.time_chin
,room.count_cancel,
room.count_book,
bookdetail.each_order,
bookdetail.each_cancel
FROM bookorder
INNER JOIN bookdetail
ON bookorder.book_id = bookdetail.book_id
INNER JOIN room
ON bookdetail.room_code = room.room_code
WHERE bookdetail.rid not like '%0%' AND bookdetail.room_code LIKE ? AND bookdetail.date_chin LIKE ? ");

if (!empty($_GET)) {
    $value = '%' . $_GET["keyword1"] . '%'; 
    $value2 = '%' . $_GET["keyword2"] . '%'; 
    $stmt->bindParam(1, $value);
    $stmt->bindParam(2, $value2);
    $stmt->execute(); 
}
echo"<div class='tb' align='center' >";
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
echo"</div>";
?>
<br>
<div class="menu"  align="center">
<a href="admin-set.php"><button>ตั้งค่าการเลือกห้อง</button></a>
<a href="roomall.php"><button>ดูห้องทั้งหมด</button></a>
<a href="each-order.php"><button>ดูการเลือกห้องแต่ละวัน</button></a>
<a href="create-json-file.php"><button>ดูประวัติการเลือกห้อง</button></a>
</div>
</body>
</html>
