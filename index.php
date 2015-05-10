<?php
// -- config
include 'config.php';

// -- lib
include 'lib/lib.php';

sec_session_start();

/*if (!isset($_SESSION['counter']))
    $_SESSION['counter']=0;
echo "Refreshed ".$_SESSION['counter']++." times.<br>
<a href=".$_SERVER['PHP_SELF'].'?'.session_name().'='.session_id().">refresh</a>";*/

// -- models
include 'components/wideimage/WideImage.php';
include 'models/db.class.php';
include 'models/brands.class.php';
include 'models/authentication.class.php';
include 'models/passwordRequest.class.php';
include 'models/loginAttempts.class.php';
include 'models/user.class.php';
include 'models/news.class.php';
include 'models/PHPMailerAutoload.php';

// -- routering
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

$controller = router($page);
include 'controllers/' . $controller;

$master = getMaster($page);
if ($page != 'ajax')
    include_once 'views/' . $master;