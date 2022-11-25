<!-- admin -->
<?php include "connect.php" ?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="detailinsert.css">
</head>
<body>
<div class="head">
        <div class="brand">
            <img src="kmutnb.png">
        </div>

        <div class="kmutnb">
            <h2>KMUTNB</h2>
            <h5>King Mongkut's University of Technology North Bangkok</h5>
        </div>
    </div>
<div class="main">
<?php
$stmt = $pdo->prepare("SELECT * FROM bookdetail WHERE rid = ?");
$stmt->bindParam(1, $_GET["rid"]);
$stmt->execute();
$row = $stmt->fetch();
?>
<div >
    <div >
        <h2>ชื่อห้อง :<?= $row["book_id"] ?></h2>
        หมายเลขห้อง :<?= $row["room_code"] ?><br>
        วันที่ :<?= $row["date_chin"] ?> <br>
        เวลา : <?= $row["time_chin"] ?> <br>

    </div>
</div>
<br><b>การเพิ่มห้องสำเร็จ <br>
</b>  <a href="roomall.php">กลับไปหน้าหลัก</a>
</div>
</body>

</html>