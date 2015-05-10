<?php
$GLOBALS = array(

    // -- general
    'general' => array(
        'shortName' => 'Corselino',
        'longName' => 'Corselino Lingerie Veurne'
    ),

    // -- master
    'template' => array(
        'landing' => 'master.landing.php',
        'master' => 'master.master.php',
        'admin' => 'master.admin.php',
        'login' => 'master.login.php'
    ),

    // -- stylesheet
    'stylesheet' => array(
        'master' => 'master.css',
        'admin' => 'dashboard.css'
    ),

    // -- nieuwsberichten
    'news' => array(
        'limit' => 5,
        'number' => 5
    ),

    // -- alerts
    'alerts' => array(
        'input_error' => 'Niet alle velden werden correct ingevuld. Gelieve opnieuw te proberen.',
        'page_success' => 'De paginagegevens werden opgeslagen.',
        'page_error' => 'De paginagegevens konden niet worden opgeslagan, gelieve opnieuw te proberen.',
        'news_success' => 'Het nieuwsbericht werd opgeslagen.',
        'news_error' => 'Het nieuwsbericht kon niet worden opgeslagen, gelieve opnieuw te proberen.'
    ),

    // -- emailadres
    'email' => 'info@corselino.be',

    // -- site
    'site' => 'http://www.corselino.be',
    'site-short' => 'www.corselino.be',

    // -- facebookpagina
    'fb' => 'https://www.facebook.com/corselino',

    // -- database
    'db' => array(
        'host' => '192.168.0.10',
        'user' => 'bflydesign',
        'pw' => 'Bfly81mysql',
        'name' => 'corselino_be'

/*        'host' => 'corselino.be.mysql',
        'user' => 'corselino_be',
        'pw' => 'sqtwwLnU',
        'name' => 'corselino_be'*/
    )
);