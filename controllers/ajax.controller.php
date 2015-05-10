<?php
if (isset($_POST['hfAction'])) {
    switch ($_POST['hfAction']) {
        case 'hfSaveBrands':
            if(isset($_POST['type'])) {
                Brands::savePageContent($_POST['type']);
            }
            break;
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
            break;
        case 'hfSavePage':
            if (isset($_POST['slug'])) {
                Page::savePage($_POST['slug']);
            }
            break;
        case 'hfLogin':
            Authentication::loginFromForm();
            break;
        case 'hfLogout':
            Authentication::logout();
            break;
    }
}