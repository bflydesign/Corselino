<?php
if ($url == 'page/edit') {
    if (Authentication::login_check() == true) {
        $title = 'dashboard';
        $style = 'admin';
        $master = 'admin';
        $view = 'editpage.view.php';

        // -- vul het formulier in met de juiste gegevens
        if (isset($_GET['p'])) {
            $page = new Page($_GET['p']);
        }
    } else {
        header ('location: /dashboard');
    }
}