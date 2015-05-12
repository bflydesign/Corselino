<?php
// -- config
include_once 'config.php';

// -- lib
include_once 'lib/lib.php';

sec_session_start();

/*if (!isset($_SESSION['counter']))
    $_SESSION['counter']=0;
echo "Refreshed ".$_SESSION['counter']++." times.<br>
<a href=".$_SERVER['PHP_SELF'].'?'.session_name().'='.session_id().">refresh</a>";*/

// -- models
require 'vendor/autoload.php';
include_once 'models/db.class.php';
include_once 'models/brands.class.php';
include_once 'models/authentication.class.php';
include_once 'models/passwordRequest.class.php';
include_once 'models/loginAttempts.class.php';
include_once 'models/user.class.php';
include_once 'models/news.class.php';
include_once 'models/PHPMailerAutoload.php';

// -- routering
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

$controller = router($page);
include_once 'controllers/' . $controller;

$master = getMaster($page);
if ($page != 'ajax')
    include_once 'views/' . $master;