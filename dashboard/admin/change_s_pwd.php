<?php
require '../../include/db_conn.php';

$key          = rtrim($_POST['login_key']);
$pass         = rtrim($_POST['pwfield']);
$user_id_auth = rtrim($_POST['login_id']);
$passconfirm= rtrim($_POST['confirmfield']);

if(empty($pass) && empty($passconfirm) && empty($key)){
    echo "<html><head>
        <link rel='icon' href='../..//favicon.ico' type='image/x-icon'> 
    <script>alert('fields cannot be empty');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=change_pwd.php'>";
}
else if($pass==$passconfirm){
    if (isset($user_id_auth) && isset($pass) && isset($key)) {
        $sql    = "SELECT * FROM admin WHERE username='$user_id_auth'";
        $result = mysqli_query($con, $sql);
        $count  = mysqli_num_rows($result);
        if ($count == 1) {
            mysqli_query($con, "UPDATE admin SET pass_key='$pass',securekey='$key' WHERE username='$user_id_auth'");
            echo "<html><head>
        <link rel='icon' href='../..//favicon.ico' type='image/x-icon'> 
    <script>alert('Profile Updated ,Login Again ');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
        } else {
            echo "<html><head>
        <link rel='icon' href='../..//favicon.ico' type='image/x-icon'> 
    <script>alert('Change wUnsuccessful');</script></head></html>";
            echo "error".mysqli_error($con);
            
        }
    } else {
        echo "<html><head>
        <link rel='icon' href='../..//favicon.ico' type='image/x-icon'> 
    <script>alert('Change Unsuccessful');</script></head></html>";
        echo "error".mysqli_error($con);
    
    }
    }
    else{
        echo "<html><head>
        <link rel='icon' href='../..//favicon.ico' type='image/x-icon'> 
    <script>alert('Confirm Password Mismatch');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=change_pwd.php'>";
    }
?>
<center>
<img src="loading.gif">
</center>