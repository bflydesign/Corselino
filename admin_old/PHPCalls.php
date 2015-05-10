<?php
if(isset($_GET['CallID']))
{
    if ($_GET['CallID'] == 'Login')
        Login::loginFromForm();
    else if ($_GET['CallID'] == 'Logout')
        Login::logout();
    else if ($_GET['CallID'] == 'ResetPassword')
        Login::resetPassword();
    else if ($_GET['CallID'] == "SaveBrands")
            Brands::savePageContent ();
    else if ($_GET['CallID'] == "DeleteImage" && isset($_GET['file']))
            Upload::deleteFile($_GET['file']);
    else if ($_GET['CallID'] == 'SendMailFromContactForm')
            Mail::sendMail ();
}
?>