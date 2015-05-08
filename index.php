<?php
// -- config
require 'config.php';

// -- lib
include_once 'lib/lib.php';

//sec_session_start();

/*if (!isset($_SESSION['counter']))
    $_SESSION['counter']=0;
echo "Refreshed ".$_SESSION['counter']++." times.<br>
<a href=".$_SERVER['PHP_SELF'].'?'.session_name().'='.session_id().">refresh</a>";*/

// -- models
require_once 'models/db.class.php';
require_once 'models/brands.class.php';
require_once 'models/authentication.class.php';
require_once 'models/passwordRequest.class.php';
require_once 'models/loginAttempts.class.php';
require_once 'models/user.class.php';
require_once 'models/news.class.php';
require_once 'models/PHPMailerAutoload.php';

// -- routering
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

$controller = router($page);
include_once 'controllers/' . $controller;

$master = getMaster($page);
include_once 'views/' . $master;