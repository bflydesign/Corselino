<?php
if (isset($_POST['hfAction'])) {
    switch ($_POST['hfAction']) {
        case 'hfSaveNews':
            if (isset($_POST['id'])) {
                News::saveNews($_POST['id']);
            } else {
                News::saveNews();
            }
            break;
        case 'hfDeleteNews':
            if (isset($_POST['id'])) {
                News::deleteNews($_POST['id']);
            }
        case 'hfSavePage':
            if (isset($_POST['slug'])) {
                Page::savePage($_POST['slug']);
            }
        case 'hfLogin':
            Authentication::loginFromForm();
            break;
        case 'hfLogout':
            Authentication::logout();
    }

}