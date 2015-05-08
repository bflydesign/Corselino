<?php
$config = array(

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
    'email' => 'info@ateliervq.be',

    // -- site
    'site' => 'http://www.ateliervq.be',
    'site-short' => 'www.ateliervq.be',

    // -- facebookpagina
    'fb' => 'https://www.facebook.com/ateliervq'
);