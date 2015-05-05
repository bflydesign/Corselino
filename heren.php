<?php
include_once 'remote.php';
include_once ROOTDIR.'admin/classes/class.brands.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Bij Corselino in Veurne vind je een ruim aanbod lingerie voor dames en heren, voor jou en oud." />
        <meta name="keywords" content="lingerie, veurne, ooststraat, corselino, nachtmode, badmode, heren, AUBADE, BARBARA, BJORN BORG, CALVIN KLEIN, CYELL, FELINA, CONTURELLE, CANAT, IMPREINTE, FERAUD, LOU MEY, REBECCA & BROS, TRIUMPH SHAPE" />
        <meta name="author" content="metatags generator">
        <meta name="robots" content="index, follow">
        <meta name="revisit-after" content="3 month">
        
        <link rel="stylesheet" type="text/css" href="style/style.css" media="all" />
      
        <!-- Add jQuery library -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        
        <script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
        </script>
         <script type="text/javascript" src="scripts.js"></script>
        
        <title>Corselino - Lingerie Veurne - Heren</title>
    </head>
    <body id="heren">        
        <!-- container -->
        <div id="container">
            <!-- logo -->
            <div id="logo">
                <img src="style/logo.png" alt="corselino" />
            </div>
            <!-- content -->
            <div id="transparant" class="light">
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
                        <div id="textfield">
                            <p>Onze merken voor heren:</p>
                            <br />
                            <p>
                                <?php echo Brands::getPageContent('heren'); ?>
                            </p>
                            <br />
                            <p>Hieronder ziet u alvast een greep uit onze collectie:</p>
                        </div>

                        <div id="lingeriebox">
                                                            <?php
                                //path to directory to scan. i have included a wildcard for a subdirectory
                                $directory = "images/heren/";

                                //get all image files with a .jpg extension.
                                $images = glob("" . $directory . "*.jpg");

                                $imgs = '';
                                // create array
                                foreach($images as $image)
                                { 
                                        $imgs[] = "$image";
                                }
                                //shuffle array
                                shuffle($imgs);

                                //select first 20 images in randomized array
                                $imgs = array_slice($imgs, 0, 6);

                                //display images
                                foreach ($imgs as $img) {
                                        $thumb = str_replace("images", "images/thumbs/", $img);
                                        echo "<div class=\"lingerie\">\n";
                                                echo "<a class=\"fancybox\" rel=\"group\" href=\"".$img."\">\n";
                                                        echo "<img src=\"".$thumb."\" class=\"imglingerie\" />\n";
                                                echo "</a>\n";
                                        echo "</div>\n";
                                }
                                ?>
                                <script>
                                        centerContainer();
                                </script>
                        </div>                    
                    </div>

                    <!-- footer -->
                    <div id="footer">
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
            
            <!-- social media -->
            <div id="socialmedia">
                <a href="https://twitter.com/share" target="_blank" class="twitter" data-lang="en"><div class="twitter"></div></a>
                <a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436'); return false;"><div class="facebook"></div></a>
                <a href="https://plus.google.com/share?url={URL}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><div class="googleplus"></div><a/>
            </div>
        </div>
    </body>
</html>
