<?php
session_start();
include_once("config.php");

if (isset($_POST['create-user'])) {
    $redirect = header("Location: ../");

    $fullname = $_POST['fname'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($fullname) && empty($username) && empty($password)) {

        $_SESSION['error'] = "All inputs is empty";
        $redirect;
    } else {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        // $hash_password = md5($password); //Password Encryption Type


        $user_query = $conn->query("INSERT INTO tbl_users (name, username, password)
                      VALUES ('{$fullname}', '{$username}', '{$hash_password}')");

        if ($user_query) {
            $_SESSION['success'] = "Successfully Signed Up"; //set session
            $redirect;
        } else {
            $_SESSION['error'] = "Something went wrong.";
            $redirect;
        }
    }
} elseif (isset($_POST['login-account'])) {
    $redirect = header("Location: ../login.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user_query = $conn->query("SELECT * FROM tbl_users WHERE username = '{$username}' LIMIT 1");

    if ($user_query->num_rows > 0) {
        $fetch_user = $user_query->fetch_assoc();

        if (password_verify($password, $fetch_user['password'])) {
            $_SESSION['success'] = "Successfully Login.";
            $_SESSION['user'] = $fetch_user['username'];
            header("Location: ../dashboard.php"); //redirect to dashboard
        } else {
            $_SESSION['error'] = "Password not match.";
            $redirect;
        }
    } else {
        $_SESSION['error'] = "Username not found.";
        $redirect;
    }
} else {
    echo ("Invalid Request");
}
?>