<?php
// -- config
//require 'config.php';

// -- lib
include_once 'lib/lib.php';

/*if (!isset($_SESSION['counter']))
    $_SESSION['counter']=0;
echo "Refreshed ".$_SESSION['counter']++." times.<br>
<a href=".$_SERVER['PHP_SELF'].'?'.session_name().'='.session_id().">refresh</a>";*/

// -- models
include_once 'models/class.brands.php';
/*require 'models/db.class.php';
require 'models/authentication.class.php';
require 'models/passwordRequest.class.php';
require 'models/loginAttempts.class.php';
require 'models/user.class.php';
require 'models/news.class.php';*/

// -- routering
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

$controller = router($page);
include_once 'controllers/' . $controller;

include_once 'views/master.master.php';