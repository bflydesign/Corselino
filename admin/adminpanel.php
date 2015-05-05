<?php
include_once '../remote.php';
include_once ROOTDIR.'admin/include/logincheck.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="style/style.css" media="all" />
        
        <title></title>
    </head>
    <body id="admin">        
        <!-- container -->
        <div id="container">
            <!-- logo -->
            <div id="logo">
                <img src="../css/logo.png" alt="corselino" />
            </div>
            <!-- content -->
            <div id="transparant" class="dark">
                <div id="wrapper">
                    <!-- menu -->
                    <div id="menu">
                        <ul>
                            <li class="first"><a href="http://www.corselino.be" target="_blank">website</a></li>
                            <li class="item"><a href="upload images" target="_self">foto's</a></li>
                            <li class="item"><a href="change brandnames" target="_self">merknamen</a></li>
                            <li class="last"><a href="" id="logout">uitloggen</a></li>
                        </ul>
                    </div>
                    <!-- pictures -->
                    <div id="content">
                        <div id="textfield">
                            <h2>Welkom op de beheermodule van uw website</h2>
                            <br />
                            <p>Van hieruit kunt u een aantal wijzigingen aanbrengen op uw website zoals het toevoegen en verwijderen van afbeeldingen en het wijzigen van merknamen</p>
                            <br />
                            <p>Kies via het bovenstaande menu de actie die u wilt uitvoeren.</p>
                            <br />
                            <p>Bij het uitloggen keert u automatisch terug naar de startpagina van uw website.</p>
                        </div>
                    </div>

                    <!-- footer -->
                    <div id="footer">
                        <div id="credentials">
                            <ul>
                                <li class="first">&COPY; 2013</li>
                                <li class="item">nv dejaegher</li>
                                <li class="item">ooststraat 11</li>
                                <li class="item">8630 veurne</li>
                                <li class="item">058 31 20 23</li>
                                <li class="last">info@corselino.be</li>
                            </ul>
                        </div>
                    </div>            
                </div>
            </div>            
        </div>
        
        <!-- SCRIPTS -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script src="https://apis.google.com/js/plusone.js"></script>
        <script type="text/javascript" src="../admin/uploadify/jquery.uploadify.min.js"></script>
    </body>
</html>
