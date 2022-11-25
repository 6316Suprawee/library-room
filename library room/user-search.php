<?php
    function get_data()
{
    $connect = mysqli_connect("localhost","root","","library room");
    $output = '';
    if(isset($_POST["query"]))
    {
     $search = mysqli_real_escape_string($connect, $_POST["query"]);
     $query = "
      SELECT * FROM history 
      WHERE std_name LIKE '%".$search."%'
     ";
    }
    else
    {
     $query = "
      SELECT * FROM history ORDER BY std_user
     ";
    }
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
     $output .= '
      <div class="table-responsive">
       <table class="table table bordered">
        <tr>
         <th>user Name</th>
         <th>name</th>
         <th>book</th>
         <th>room Code</th>
         <th>time</th>
        </tr>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>
        <td>'.$row["std_user"].'</td>
        <td>'.$row["std_name"].'</td>
        <td>'.$row["std_book"].'</td>
        <td>'.$row["room_code"].'</td>
        <td>'.$row["time_chin"].'</td>
       </tr>
      ';
     }
     echo $output;
    }
    else
    {
     echo 'Data Not Found';
    }
}
    ?>