<!-- admin -->
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
<?php
  include "connect.php";
  
  session_start();

  $stmt = $pdo->prepare("SELECT * FROM admin WHERE code_admin = ? AND pass_admin = ?");
  $stmt->bindParam(1, $_POST["code_admin"]);
  $stmt->bindParam(2, $_POST["pass_admin"]);
  $stmt->execute();
  $row = $stmt->fetch();
  setcookie("user_std", $_POST["code_admin"],time()+3600*24*1);
  // หาก username และ password ตรงกัน จะมีข้อมูลในตัวแปร $row
  if (!empty($row)) { 
    // นำข้อมูลผู้ใช้จากฐานข้อมูลเขียนลง session 2 ค่า
    $_SESSION["fullname"] = $row["user_admin"];   
    $_SESSION["username"] = $row["code_admin"];
    // แสดง link เพื่อไปยังหน้าต่อไปหลังจากตรวจสอบสำเร็จแล้ว
    echo"<div class='check'>";
    echo "<h1>เข้าสู่ระบบสำเร็จ</h1><br>";
    ?>
    <a href="roomall.php?code_admin=<?=$row["code_admin"]?>">เข้าสู่หน้าผู้ใช้</a><?php 

  // กรณี username และ password ไม่ตรงกัน
  } else {
    echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
    echo "<a href='index.html'>เข้าสู่ระบบอีกครัง</a>"; 
  }
  echo"</div>";
?>
</body>
</html>