<?php
if (Authentication::login_check() == true) {
    $title = 'dashboard';
    $style = 'admin';
    $view = 'fileserver.view.php';
    $master = 'admin';
} else {
    header('location: /dashboard');
}