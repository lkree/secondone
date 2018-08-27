<?php
require_once 'config.php';
require_once 'functions.php';

if (isset($_SERVER['REQUEST_URI'])) {
    $url = $_SERVER['REQUEST_URI'];

    $sql = mysqli_query($db, "SELECT * FROM `bdtest1` WHERE `url` = '$url'");
    if($sql) {
        $row = mysqli_num_rows($sql);
        $data = mysqli_fetch_row($sql);
        if ($row != 0) { 
            include_once 'html/form2.php';
        } 
        else {
            include 'html/form1.php';
        }
    }
}   
else {
    include 'html/form1.php';
}
  
if (isset($_POST['submit_button'])) {
    $password = $_POST['password'];
    $text1 = $_POST['text'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $id_hash = password_hash($password, PASSWORD_BCRYPT, [$cost=10]);
    $password_intobd = '/' . substr($id_hash, -5);

    $sql1 = mysqli_query($db, "INSERT INTO `bdtest1`(`text`, `password`, `url`, `id`) VALUES ('$text1', '$password_hash', '$password_intobd', null)");
    $sql1 = mysqli_query($db, "SELECT * FROM `bdtest1` ORDER BY `id` DESC LIMIT 1");

    $actual_link = "http://$_SERVER[HTTP_HOST]";

    $row = mysqli_fetch_row($sql1);
    $url = $actual_link . $row[2]; 
    url1($url);
}
if(isset($_POST['submit'])) {
    $text = $data[0];
    $pass = $_POST['password1'];
    $password_ver = password_verify($pass, $data[1]);
        if ($password_ver == true) {
            printtext($text);
        }
        else {
            wrongpassword();  
    }
}