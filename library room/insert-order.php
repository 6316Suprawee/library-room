<!-- admin -->
<?php session_start(); ?>
<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("INSERT INTO bookdetail VALUES ('', ?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $_POST["book_id"]);
$stmt->bindParam(2, $_POST["room_code"]);
$stmt->bindParam(3, $_POST["date_chin"]);
$stmt->bindParam(4, $_POST["time_chin"]);
$stmt->bindParam(5, $_POST["each_order"]);
$stmt->bindParam(6, $_POST["each_cancel"]);
$stmt->execute();
$rows  = $stmt->fetch();
$rid = $pdo->lastInsertId();

header("location: detail-insert.php?rid=" . $rid);
?>
