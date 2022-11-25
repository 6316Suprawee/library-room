<?php
    function get_data()
{
    $connect = mysqli_connect("localhost","root","","library room");
    $query = "SELECT * FROM student";
    $result  = mysqli_query($connect, $query);
    $student_data  = array();
    while($row = mysqli_fetch_array($result))
    {
        
        $student_data[] = array(
            'std_user' => $row['std_user'],
            'std_name' => $row['std_name'],
            'std_book' => $row['std_book'],
            'std_pass' => $row['std_pass'],
            'room_code' => $row['room_code'],
            'time_chin' => $row['time_chin'],


        );
       

    }

    
    return json_encode($student_data);
}




echo '<pre>';
print_r(get_data());
echo '</pre>';

$file_name = 'data.json';

if(file_put_contents($file_name, get_data()))
{
    echo $file_name.'file created';

}
else
{
    echo 'There is some error';   
}
header("location: insert-json.php");

?>