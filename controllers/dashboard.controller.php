<?php
if (Authentication::login_check() != true) {
    header('location: login');
}

$view = 'dashboard.view.php';