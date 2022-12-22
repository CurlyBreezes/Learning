<?php
session_start();
include_once("config.php");

if(isset($_SESSION['user'])){
    $username = $_SESSION['user'];
    $user_query = $conn->query("SELECT * FROM tbl_users WHERE username = '{$username}' LIMIT 1");
    
    if($user_query->num_rows > 0){
        $user_row = $user_query->fetch_assoc();
    }else{
        header("Location: login.php");
    }
}else{
    header("Location: login.php");
}
?>

