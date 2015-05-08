<?php
if (Authentication::login_check() == true) {
    header ('location: admin/dashboard');
}