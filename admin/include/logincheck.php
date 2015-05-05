<?php
include_once '../remote.php';
include_once ROOTDIR.'admin/classes/class.login.php';

if (!$_SESSION) 
        Login::sec_session_start();

if (($_SERVER['REQUEST_URI'] != 'index.php') && ($_SERVER['REQUEST_URI'] != $_SESSION['oldURL'])) 
        $_SESSION['oldURL'] = $_SERVER['REQUEST_URI'];

if(Login::login_check() == false)
        header('location: index.php');
?>
