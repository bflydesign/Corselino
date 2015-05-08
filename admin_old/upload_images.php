<?php
include_once '../remote.php';
include_once ROOTDIR.'admin/include/logincheck.php';

include_once ROOTDIR.'admin/include/functions.php';
include_once ROOTDIR.'admin/classes/class.upload.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
        $upload = new Upload();
        
        if(isset($_POST['btnLingerie'])) {                
                if ($upload->uploadFile('lingerie') == true) {
                        $result = "ok";
                }
        }
        if(isset($_POST['btnBadmode'])) {                
                if ($upload->uploadFile('badmode') == true) {
                        $result = "ok";
                }
        }
        if(isset($_POST['btnNachtmode'])) {                
                if ($upload->uploadFile('nachtmode') == true) {
                        $result = "ok";
                }
        }
        if(isset($_POST['btnHeren'])) {                
                if ($upload->uploadFile('heren') == true) {
                        $result = "ok";
                }
        }
        
        if ($result == "ok") {
                $class = "succes";
                $message = "Uw bestand werd opgeslagen";
        }
        else {
                $class = "error";
                $message = "Uw bestand kan niet worden opgeladen.";
        }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <!-- STYLESHEETS -->
        <link rel="stylesheet" type="text/css" href="style/style.css" media="all" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script>
                $(function() {
                        $("#tabs").tabs();
                });
                </script>
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
                                        <!--UPLOAD-->
                                        <div id="tabs">
                                                <ul>
                                                        <li><a href="#lingerie">Lingerie</a></li>
                                                        <li><a href="#badmode">Badmode</a></li>
                                                        <li><a href="#nachtmode">Nachtmode</a></li>
                                                        <li><a href="#heren">Heren</a></li>
                                                </ul>
                                                <div id="lingerie">
                                                        <form enctype="multipart/form-data" id="formUploadLingerie" action="upload images#lingerie" method="post" class="formstyle">
                                                                <fieldset>
                                                                        <input type="file" name="fileLingerie" />
                                                                        <input type="submit" name="btnLingerie" value="Opslaan" class="button" />
                                                                        <p class="<?php echo $class; ?>"><?php echo $message; ?></p>
                                                                </fieldset>
                                                        </form>
                                                        <div class='imagelist'>
                                                                <h3>Klik op de foto's om ze te verwijderen</h3>
                                                                <?php
                                                                $dirname = "../images/lingerie/";
                                                                $images = glob($dirname."*.jpg");
                                                                foreach($images as $image) {
                                                                        echo '<a onclick="return confirm(\'Wilt u deze foto uit de lijst verwijderen ?\');" href="PHPCalls.php?CallID=DeleteImage&file='.$image.'"><img src="'.$image.'" class="thumb" /></a>';
                                                                }
                                                                ?>
                                                        </div>
                                                </div>
                                                <div id="badmode">
                                                        <form enctype="multipart/form-data" id="formUploadBadmode" action="upload images#badmode" method="post" class="formstyle">
                                                                <fieldset>
                                                                        <input type="file" name="fileBadmode" />
                                                                        <input type="submit" name="btnBadmode" value="Opslaan" class="button" />
                                                                        <p class="<?php echo $class; ?>"><?php echo $message; ?></p>
                                                                </fieldset>
                                                        </form>
                                                        <div class='imagelist'>
                                                                <h3>Klik op de foto's om ze te verwijderen</h3>
                                                                <?php
                                                                $dirname = "../images/badmode/";
                                                                $images = glob($dirname."*.jpg");
                                                                foreach($images as $image) {
                                                                       echo '<a onclick="return confirm(\'Wilt u deze foto uit de lijst verwijderen ?\');" href="PHPCalls.php?CallID=DeleteImage&file='.$image.'"><img src="'.$image.'" class="thumb" /></a>';
                                                                }
                                                                ?>
                                                        </div>
                                                </div>
                                                <div id="nachtmode">
                                                        <form enctype="multipart/form-data" id="formUploadNachtmode" action="upload images#nachtmode" method="post" class="formstyle">
                                                                <fieldset>
                                                                        <input type="file" name="fileNachtmode" />
                                                                        <input type="submit" name="btnNachtmode" value="Opslaan" class="button" />
                                                                        <p class="<?php echo $class; ?>"><?php echo $message; ?></p>
                                                                </fieldset>
                                                        </form>
                                                        <div class='imagelist'>
                                                                <h3>Klik op de foto's om ze te verwijderen</h3>
                                                                <?php
                                                                $dirname = "../images/nachtmode/";
                                                                $images = glob($dirname."*.jpg");
                                                                foreach($images as $image) {
                                                                        echo '<a onclick="return confirm(\'Wilt u deze foto uit de lijst verwijderen ?\');" href="PHPCalls.php?CallID=DeleteImage&file='.$image.'"><img src="'.$image.'" class="thumb" /></a>';
                                                                }
                                                                ?>
                                                        </div>
                                                </div>
                                                <div id="heren">
                                                       <form enctype="multipart/form-data" id="formUploadHeren" action="upload images#heren" method="post" class="formstyle">
                                                                <fieldset>
                                                                        <input type="file" name="fileHeren" />
                                                                        <input type="submit" name="btnHeren" value="Opslaan" class="button" />
                                                                        <p class="<?php echo $class; ?>"><?php echo $message; ?></p>
                                                                </fieldset>
                                                        </form>
                                                        <div class='imagelist'>
                                                                <h3>Klik op de foto's om ze te verwijderen</h3>
                                                                <?php
                                                                $dirname = "../images/heren/";
                                                                $images = glob($dirname."*.jpg");
                                                                foreach($images as $image) {
                                                                        echo '<a onclick="return confirm(\'Wilt u deze foto uit de lijst verwijderen ?\');" href="PHPCalls.php?CallID=DeleteImage&file='.$image.'"><img src="'.$image.'" class="thumb" /></a>';
                                                                }
                                                                ?>
                                                        </div>
                                                </div>
                                        </div>
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
                <script src="//code.jquery.com/jquery-1.9.1.js"></script>
                <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
                <script>
                $(function() {
                  $( "#tabs" ).tabs();
                });
                </script>
                
         </body>
</html>
