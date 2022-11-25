<?php
    include("config.php");
    if(isset($_POST['input'])){

        $input = $_POST['input'];

        $query = "SELECT * FROM history WHERE std_user LIKE '%{$input}%' OR
        std_name LIKE '%{$input}%' OR
        room_code LIKE '%{$input}%' OR 
        time_chin LIKE '%{$input}%' OR 
        id LIKE '%{$input}%' ";

        $result = mysqli_query($connect,$query);

        if(mysqli_num_rows($result) > 0){?>
        <table border="1"> 
            <thead>
                        <tr>
                            <th>id</th>
                            <th>user</th>
                            <th>name</th>
                            <th>room</th>
                            <th>time</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_array($result))
                        {
                            
                            $id = $row['id'];
                            $user = $row['std_user'];
                            $name = $row['std_name'];
                            $room = $row['room_code'];
                            $time = $row['time_chin'];
                            
                            ?>
                            <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $user;?></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $room;?></td>
                            <td><?php echo $time;?></td>
                        </tr>
                       <?php 
                       }
                        
                        ?>
                        
                        
                </tbody>
        </table>
           
        <?php
       
        }else{

            echo"<h6> No data Found</h6>";
        }
    }
?>
