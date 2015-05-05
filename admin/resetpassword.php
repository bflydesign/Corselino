<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="style/style_login.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../admin/uploadify/uploadify.css" media="all" />
        
        <title></title>
    </head>
    <body id="admin">        
        <!-- container -->
        <div id="container">
            <!-- logo -->
            <div id="logo">
                <img src="../style/logo.png" alt="corselino" />
            </div>
            <!-- content -->
            <div id="transparant" class="dark">
                <div id="wrapper">
                    <!-- menu -->
                    <div id="menu">
                        <h3>Reset hier uw wachtwoord</h3>
                    </div>
                    <!-- pictures -->
                    <div id="content">
                        <div id="textfield">
                            <div id="form">
                                <form id="form_resetpassword" action="" method="post" class="formstyle">
                                    <fieldset>
                                            
                                            <p id="message" class="message" name="message"></p>
                                            
                                        <label for="username">* Gebruikersnaam</label>
                                        <input type="text" id="username" name="username" />

                                        <br />

                                        <label for="email">* Email</label>
                                        <input type="email" id="email" name="email" />

                                        <br />

                                        <button id="confirm" name="confirm" class="button">Versturen</button>
                                    </fieldset>
                                </form>
                            </div>                            
                            
                            <div id="loginattributes">
                                <div id="logo">
                                    <img src="style/logo_bflydesign.png" />
                                </div>
                                <div id="resetpw">
                                    
                                </div>                                
                            </div>
                            
                            <div class="clear"></div>
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
            <!-- jquery/jqueryui/ajaxlib -->
            <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
            <!-- custom -->
            <script type="text/javascript" src="js/ajaxResetPassword.js"></script>
    </body>
</html>
