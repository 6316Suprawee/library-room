<?php session_start(); ?>
<?php include "connect.php" ?>


<html>

<head>
    
    <meta charset="UTF-8">

    <script>
        function myFunction(){
            var room_code = document.getElementById("room_code").value;
            var time_chin = document.getElementById("time_chin").value;
            var book_id = document.getElementById("book_id").value;
            if(time_chin == '9.00-11.00'){
                switch(room_code){
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
        }
        else if(time_chin == '13.00-15.00'){
            switch(room_code){
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
    <link rel="stylesheet" href="adminset.css">
    <link rel="stylesheet" href="checkduplicate.css">   
</head>

<body>
<div class="head">
    <div class="brand">
        <img src="kmutnb.png" alt="photo">
    </div>
    <h1><?=$_SESSION["fullname"]?> </h1><br>
    
    <div class="logout">
        <a href='logout.php'><button>ออกจากระบบ</button></a><br>
    </div>
</div> 
<h2 title="details">ตั้งค่าการเลือกห้อง</h2> <br>
<div class="contentmain">
<table>
<form  action="" method="post" id = "form-messages" >
<tr>
<th>วันที่ </th>
<th>Room Code</th>
<th>Room</th>
<th>เวลา</th>
</tr>
<tr>
<td>
<input type="date" name="date_chin" id = "date_chin" required onchange="myFunction()">
<input type="hidden" name="each_order" id ="each_order">
<input type="hidden" name="each_cancel" id ="each_cancel">
</td>
<td>
<input type="text" name="book_id" id ="book_id" >
</td>
<td>
<select name="room_code" id = "room_code" onchange="myFunction()">
    
    <option value="701" >R1|701</option>
    <option value="702" >R2|702</option>
    <option value="703" >R3|703</option>
    <option value="704" >R4|704</option>
</select>
</td>
<td>
<select name="time_chin" id = "time_chin"  onchange="myFunction()" >

    <option value="9.00-11.00">9.00-11.00</option>
    <option value="13.00-15.00">13.00-15.00</option>
</select>
</select>
</td>
</tr>
</table>
<br>
<?php
    if(isset($_POST['submit'])) {

        //get the name and comment entered by user
        $date = $_POST['date_chin'];
        $room = $_POST['room_code'];
        $time = $_POST['time_chin'];

        //connect to the database
        $dbc = mysqli_connect("localhost","root","","library room") or die('Error connecting to MySQL server');
        $check=mysqli_query($dbc,"select * from bookdetail where date_chin='$date' and room_code='$room' and time_chin='$time'");
        $checkrows=mysqli_num_rows($check);
    
       if($checkrows>0) {
          echo "Can't";
       } else {  
        //insert results from the form input
        }
        echo "Room Added";
        
        };
  ?>
<br>

<input type="submit"  value="เช็คห้องซ้ำ" name = 'submit' id = "submit">


<br>


<div class="button">
    <button class="button1" onclick="document.location='roomall.php'">กลับไปหน้าหลัก</button>
    <button class="button2" onclick="document.location='admin-set.php'">เปิดห้องจอง</button>
</div>
</form>
</body>
</html>