<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
require '../../include/db_conn.php';
page_protect();

$et_id = $_POST['et_id'];
echo $et_id;
if (strlen($et_id) > 0) {
    mysqli_query($con, "DELETE FROM enrolls_to WHERE et_id='$et_id'");
    echo "<html><head>
	<link rel='icon' href='../..//favicon.ico' type='image/x-icon'> 
<script>alert('Member Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
}
else{
    echo "<html><head>
	<link rel='icon' href='../..//favicon.ico' type='image/x-icon'> 
<script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
    echo 'error'.mysqli_error($con);
}

?>