
<!-- admin -->
<?php include "connect.php" ?>
<html>
<head>
<link rel="stylesheet" href="logout.css">
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
<?php
	session_start();

    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    setcookie("user_admin", "",time());
    setcookie("user_std", "",time());
	session_destroy(); // ทำลาย session
    
?>
<div class='check'>
<h3>ออกจากระบบสำเร็จแล้ว</h3><br>
<img class="gif" src='https://media.tenor.com/Zwj324Q8btMAAAAM/im-out-homer-simpson.gif'><br>
<h3>หากต้องการเข้าสู่ระบบอีกครั้งโปรดคลิก</h3>
<a href='index.html'>เข้าสู่ระบบ</a>
</div>
</body>

</html>