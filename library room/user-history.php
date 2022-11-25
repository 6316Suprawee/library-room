<?php session_start(); ?>
<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM student 
    JOIN room 
    JOIN bookdetail 
    ON bookdetail.room_code = room.room_code 
    JOIN bookorder
    ON bookorder.book_id = bookdetail.book_id 
    WHERE std_user=? ");

    $stmt->bindParam(1, $_GET["std_user"]);
    $stmt->execute();
    $rows = $stmt->fetch();
?>
<html>
<head>
<link rel="stylesheet" href="userhistory.css">   
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
<?php
$stmt = $pdo->prepare("SELECT * FROM history ");
$stmt->execute();
?>
<div class="userhistorymain" align="center">
<h2 title="details">ประวัติการจอง</h2> 
</b>
<?php
    ?>
    <?php
?>
<br>
 <input type="text" id = "live_search" autocomplete="off"
 placeholder="Search...">

 <div id = "searchresult"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){
            var input = $(this).val();
           

            if(input != ""){
                $.ajax({


                    url: "livesearch.php",
                    method: "POST",
                    data:{input:input},


                    success:function(data){
                        $("#searchresult").html(data);
                        $("#searchresult").css("display,block");
                    }
                })
            }else{
                $("#searchresult").html("");
            }
        });
    });
        

</script>

<div class="button">
    <button class="refes" onclick="document.location='create-json-file.php'">กดเพื่อรีเฟรชข้อมูล</button><br>
    <button class="button1" onclick="document.location='admin-set.php'">ตั้งค่าการเลือกห้อง</button>
    <button class="button2" onclick="document.location='roomall.php'">ดูห้องทั้งหมด</button>
    <button class="button3" onclick="document.location='each-order.php'">ดูการเลือกห้องแต่ละวัน</button>
</div>
<?php
?>
</div>
</body>
</html>