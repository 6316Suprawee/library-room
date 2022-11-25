<?php session_start(); ?>
<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM student JOIN room JOIN bookdetail ON bookdetail.room_code = room.room_code JOIN bookorder ON bookorder.book_id = bookdetail.book_id WHERE std_user=? ");
    $stmt->bindParam(1, $_GET["std_user"]);;
    $stmt->execute();
    $rows = $stmt->fetch();
    setcookie("user_std", $_GET["std_user"],time()+3600*24*1);
?>
 
<html>
<head>

<link rel="stylesheet" href="userdate.css">
<link rel="stylesheet" href="userdatemoblie.css">
</head>

<body>

 
<div class="head">
    <div class="brand">
        <img src="kmutnb.png" alt="photo">
    </div>
    <h1><?=$_SESSION["fullname"]?></h1><br>
    <p class="numjong">จำนวการจอง:<?=$rows["std_book"]?></p>
    <div class="logout">
        <a href='logout.php'><button>ออกจากระบบ</button></a><br>
    </div>
</div>
<?php
$stmt = $pdo->prepare("SELECT room.room_code,
bookdetail.time_chin,
bookorder.book_cancel,
bookorder.book_status,
bookdetail.date_chin,
bookdetail.time_chin,
room.count_cancel,
room.count_book,
bookorder.book_id,
bookdetail.each_order,
bookdetail.each_cancel
FROM bookorder
INNER JOIN bookdetail
ON bookorder.book_id = bookdetail.book_id
INNER JOIN room
ON bookdetail.room_code = room.room_code
WHERE bookdetail.rid not like '%0%'
GROUP BY `bookdetail`.`date_chin`
ORDER BY `bookdetail`.`date_chin` ASC");
$stmt->execute();
echo"<div class='tb'>";
echo"<table>";
echo "<tr>";
echo "<th>"; echo "วันที่"; echo "</th>";
echo "<th>"; echo "Check-in"; echo "</th>";
echo "</tr>";
while ($rowr = $stmt->fetch())
{   
    $_SESSION["bookcancel"]=$rowr["book_cancel"];
    $_SESSION["bookstatus"]=$rowr["book_status"];
    ?>
    <tr>
    <td><?=$rowr["date_chin"]?></td>
    <td class="jong"><a href="user-home.php?std_user=<?=$rows["std_user"]?>&room_code=<?=$rowr["room_code"]?>&date_chin=<?=$rowr["date_chin"]?>"><button>จอง</button></a></td>
    </tr>
    <?php
}
echo"</table>";
echo"</div>";

?>
</body>
</html>