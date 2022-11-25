<?php session_start(); ?>
<?php include "connect.php" ?>

<html>

<head>
    <link rel="stylesheet" href="adminset.css">
    <meta charset="UTF-8">
    <script>
        function myFunction() {
            var room_code = document.getElementById("room_code").value;
            var time_chin = document.getElementById("time_chin").value;
            var book_id = document.getElementById("book_id").value;
            if (time_chin == '9.00-11.00') {
                switch (room_code) {
                    case '701':
                        document.getElementById("book_id").value = 'R1';
                        break;
                    case '702':
                        document.getElementById("book_id").value = 'R2';
                        break;
                    case '703':
                        document.getElementById("book_id").value = 'R3';
                        break;
                    case '704':
                        document.getElementById("book_id").value = 'R4';
                        break;
                }
            } else if (time_chin == '13.00-15.00') {
                switch (room_code) {
                    case '701':
                        document.getElementById("book_id").value = 'R5';
                        break;
                    case '702':
                        document.getElementById("book_id").value = 'R6';
                        break;
                    case '703':
                        document.getElementById("book_id").value = 'R7';
                        break;
                    case '704':
                        document.getElementById("book_id").value = 'R8';
                        break;
                }
            }
        }
    </script>
</head>

<body>
    <div class="head">
        <div class="brand">
            <img src="kmutnb.png" alt="photo">
        </div>
        <h1><?= $_SESSION["fullname"] ?> </h1><br>

        <div class="logout">
            <a href='logout.php'><button>ออกจากระบบ</button></a><br>
        </div>
    </div>
    <h2 title="details">เพิ่มการจอง</h2>
    <div class="contentmain">
        <table>
            <form action="insert-order.php" method="post">

                <tr>
                    <th>วันที่ </th>
                    <th><label>Room</th>
                    <th><label>เวลา</th>
                </tr>
                <tr>
                    <td>
                        <input type="date" name="date_chin" id="date_chin" required>
                        <input type="hidden" name="each_order" id="each_order">
                        <input type="hidden" name="each_cancel" id="each_cancel">
                        <input type="text" name="book_id" id="book_id">
                    </td>
                    <td>
                        <select name="room_code" id="room_code" onchange="myFunction()">
                            <option value="room_code">----select----</option>
                            <option value="701">R1|701</option>
                            <option value="702">R2|702</option>
                            <option value="703">R3|703</option>
                            <option value="704">R4|704</option>
                        </select>
                    </td>
                    <td>
                        </label>

                        <select name="time_chin" id="time_chin" onchange="myFunction()">
                            <option value="9.00-11.00">9.00-11.00</option>
                            <option value="13.00-15.00">13.00-15.00</option>
                        </select>
                        </label>
                        </select>
                        </label>
                    </td>
                </tr>
        </table>
        <br>
        <input type="submit" value="เพิ่มการจอง" class="addjong" onclick="return mess();">
        <br>
        <script type="text/javascript">
            function mess() {
                var date = document.getElementById("date_chin").value;
                if (date != '') {
                    alert("Your Record is Successfully saved");
                    return true;
                } else {
                    alert("Your Record is Not saved");
                    return true;
                }
            }
        </script>
        </form>
        <div class="glub">
            <a href="roomall.php"><button>กลับไปหน้าหลัก</button></a>
        </div>


    </div>

</body>

</html>