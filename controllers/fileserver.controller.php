<?php
if (Authentication::login_check() == true) {
    $title = 'Filemanager';
    $view = 'fileserver.view.php';
} else {
    header('location: /admin/dashboard');
}