<?php
$sql="UPDATE bookorder SET book_status='$book_status WHERE book_id='$book_id' AND book_status= '1' " 
$result=$conn->query($sql);
if($result==1){
    $msg="การดําเนินการเสร็จสิ้น";
}else{
    $msg="การดําเนินการผิดพลาด";
}
?>
<script>
    alert('<?php echo $msg;?>');
</script>