<?php
include_once '../remote.php';
include_once ROOTDIR.'admin/include/logincheck.php';

include_once ROOTDIR.'admin/include/functions.php';
include_once ROOTDIR.'admin/classes/class.brands.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="style/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="uploadify/uploadify.css" media="all" />
        
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
                                <form id="form_brands" action="" method="post" class="formstyle">
                                        <fieldset>
                                                
                                                <legend>
                                                        Merknamen aanpassen
                                                </legend>
                                                
                                                <label for="lingerie">Lingerie</label>
                                                <textarea id="lingerie" name="lingerie"><?php Brands::getPageContent('lingerie'); ?></textarea>

                                                <br />

                                                <label for="badmode">Badmode</label>
                                                <textarea id="badmode" name="badmode"><?php Brands::getPageContent('badmode');  ?></textarea>

                                                <br />

                                                <label for="nachtmode">Nachtmode</label>
                                                <textarea id="nachtmode" name="nachtmode"><?php Brands::getPageContent('nachtmode');  ?></textarea>

                                                <br />

                                                <label for="heren">Heren</label>
                                                <textarea id="heren" name="heren"><?php Brands::getPageContent('heren');  ?></textarea>

                                                <br />

                                                <input type="submit" id="confirm" name="confirm" value="Opslaan" class="button" />                                                
                                                
                                                <p id="successmessage" class="hidden successfield">Uw gegevens werden goed verstuurd</p>
                                                <p id="errormessage" class="hidden errorfield">Er is iets foutgelopen bij het bewaren van de gegevens, gelieve opnieuw te proberen</p>
                                         </fieldset>
                                </form>
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
        <script type="text/javascript" src="uploadify/jquery.uploadify.min.js"></script>
        <script type="text/javascript" src="../js/ajaxSaveBrands.js"> </script>
        <script type="text/javascript" src="js/ajaxLogin.js"> </script>
    </body>
</html>
