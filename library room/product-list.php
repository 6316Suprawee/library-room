<?php
	include "connect.php";
    session_start();
    // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
    if (empty($_SESSION["std_name"]) ) { 
        header("location: login-form.php");
    }
?>

<html>
<head><meta charset="utf-8"></head>
<body>
<?php
   $stmt = $pdo->prepare("SELECT * FROM product");
   $stmt->execute();

   while ($row = $stmt->fetch()) {
       echo ": " . $row [""] . "<br>";
       echo ": " . $row [""] . "<br>";
       echo "<hr>\n";
   }
?>
</body>
</html>
