<?php
if (Authentication::login_check() != true) {
    header('location: /login');
}
$title = 'Dasbhoard';
$view = 'dashboard.view.php';