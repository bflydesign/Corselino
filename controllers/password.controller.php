<?php
if (Authentication::login_check() == true) {
    $title = 'Dashboard';
    $style = 'admin';
    $view = 'admin.view.php';
    $master = 'admin';
} else {
    $title = 'Login';
    $master = 'login';
}