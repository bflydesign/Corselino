<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Bij Corselino in Veurne vind je een ruim aanbod lingerie voor dames en heren, voor jou en oud." />
        <meta name="keywords" content="lingerie, veurne, ooststraat, corselino, nachtmode, badmode, heren, AUBADE, BARBARA, BJORN BORG, CALVIN KLEIN, CYELL, FELINA, CONTURELLE, CANAT, IMPREINTE, FERAUD, LOU MEY, REBECCA & BROS, TRIUMPH SHAPE" />
        <meta name="author" content="metatags generator">
        <meta name="robots" content="index, follow">
        <meta name="revisit-after" content="3 month">
        
        <!-- STYLESHEET -->        
        <link rel="stylesheet" type="text/css" href="style/style.css" media="all" />
        
        <title>Corselino - Lingerie Veurne - Contact</title>
    </head>
    <body id="contact">        
        <!-- container -->
        <div id="container">
            <!-- logo -->
            <div id="logo">
                <img src="style/logo.png" alt="corselino" />
            </div>
            <!-- content -->
            <div id="transparant" class="dark">
                <div id="wrapper">
                    <!-- menu -->
                    <div id="menu">
                        <ul>
                            <li class="first"><a href="home" target="_self">welkom</a></li>
                            <li class="item"><a href="lingerie" target="_self">lingerie</a></li>
                            <li class="item"><a href="badmode" target="_self">badmode</a></li>
                            <li class="item"><a href="nachtmode" target="_self">nachtmode</a></li>
                            <li class="item"><a href="heren" target="_self">heren</a></li>
                            <li class="last"><a href="contact" target="_self">contact & ligging</a></li>
                        </ul>
                    </div>
                    <!-- pictures -->
                    <div id="content">
                        <form id="mailform" class="formstyle" action="#" method="post">
                            
                            <p id="succesmessage" class="succes hidden">Uw bericht werd verzonden, wij reageren zo snel mogelijk</p>
                            <p id="failmessage" class="fail hidden">Uw bericht werd niet verzonden, gelieve opnieuw te proberen</p>
                            
                            <label for="name">* Naam</label>
                            <input type="text" name="name" id="name" class="txt" />

                            <br />

                            <label for="email">* Email</label>
                            <input type="text" name="email" id="email" class="txt" />

                            <br />

                            <label for="message">* Bericht</label>
                            <textarea name="message" id="message" class="txt"></textarea>

                            <br />
                            
                            <label for="inputcaptcha">* Los op</label>
                            <img src="captcha/image.php" alt="Click to reload image" title="Click to reload image" name="captcha" id="captcha" onclick="javascript:reloadCaptcha()" />                            
                            <input type="text" id="inputcaptcha" name="inputcaptcha" />
                            <input type="submit" name="confirm" id="confirm" value="* VERSTUREN" class="button" />
                            <br />
                        </form>

                        <div id="map">
                            <a href="https://maps.google.be/?ll=51.072834,2.664021&spn=0.001318,0.003074&t=m&z=19&iwloc=lyrftr:m,7867411073410667385,51.072736,2.663903" target="_blank" />
                                <img src="style/googlemaps_64.png" alt="googlemaps" />
                            </a>
                            <img src="style/imgShop.jpg" alt="" width="160px" />
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
            
            <!-- social media -->
            <div id="socialmedia">
                <a href="https://twitter.com/share" target="_blank" class="twitter" data-lang="en"><div class="twitter"></div></a>
                <a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436'); return false;"><div class="facebook"></div></a>
                <a href="https://plus.google.com/share?url={URL}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><div class="googleplus"></div><a/>
            </div>
        </div>
        
        <!-- SCRIPTS -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="scripts.js"></script>
        <script type="text/javascript" src="admin/js/ajaxContactForm.js"></script>
        <script>
                centerContainer();
        </script>
        <script type="text/javascript">
        function reloadCaptcha() {
            var img = document.getElementById('captcha'),
                timestamp = new Date().getTime();
            img.src = 'captcha/image.php?' + timestamp;
         }
        </script>
    </body>
</html>
