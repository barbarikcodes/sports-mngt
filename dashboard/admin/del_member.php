<?php
require '../../include/db_conn.php';
page_protect();

$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "DELETE FROM users WHERE userid='$msgid'");
    echo "<html><head>
	<link rel='icon' href='../..//favicon.ico' type='image/x-icon'> 
<script>alert('Member Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
} else {
    echo "<html><head>
	<link rel='icon' href='../..//favicon.ico' type='image/x-icon'> 
<script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>