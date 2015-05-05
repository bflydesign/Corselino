<?php
include_once '../remote.php';

include_once ROOTDIR.'admin/include/functions.php';
include_once ROOTDIR.'admin/classes/class.mail.php';
include_once ROOTDIR.'admin/classes/class.login.php';
include_once ROOTDIR.'admin/classes/class.user.php';
include_once ROOTDIR.'admin/classes/class.brands.php';
include_once ROOTDIR.'admin/classes/class.upload.php';


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