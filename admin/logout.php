<?php session_start(); 
 
if (isset($_SESSION['UserName'])){
    unset($_SESSION['UserName']); // xóa session login
}
// destroy the session
session_destroy();
header('Location:index.php');
?>