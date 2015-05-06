<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Bij Corselino in Veurne vind je een ruim aanbod lingerie voor dames en heren, voor jou en oud." />
    <meta name="keywords" content="lingerie, veurne, ooststraat, corselino, nachtmode, badmode, heren, AUBADE, BARBARA, BJORN BORG, CALVIN KLEIN, CYELL, FELINA, CONTURELLE, CANAT, IMPREINTE, FERAUD, LOU MEY, REBECCA & BROS, TRIUMPH SHAPE" />
    <meta name="author" content="metatags generator">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="3 month">

    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <!-- fancybox -->
    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />

    <title><?php print isset($title) ? $title : ''; ?> | Corselino Lingerie Veurne</title>
</head>
<body id="<?php print $page; ?>">
<!-- container -->
<div id="container">
    <!-- logo -->
    <div id="logo">
        <img src="css/logo.png" alt="corselino lingerie veurne" />
    </div>
    <!-- box -->
    <div id="transparant" class="<?php print isset($transparent) ? $transparent : 'light'; ?>">
        <div id="wrapper">
            <!-- menu -->
            <?php include_once 'navigation.master.php'; ?>

            <!-- content -->
            <main class="clearfix">
                <?php include_once isset($view) ? $view : ''; ?>
            </main>
        </div>
        <!-- footer -->
        <?php include_once 'footer.master.php'; ?>
    </div>

    <!-- social media -->
    <div id="socialmedia">
        <a href="https://twitter.com/share" target="_blank" class="twitter" data-lang="en"><div class="twitter"></div></a>
        <a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436'); return false;"><div class="facebook"></div></a>
        <a href="https://plus.google.com/share?url={URL}" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><div class="googleplus"></div><a/>
    </div>
</div>

<!--SCRIPTS-->
<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox();
    });
</script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript">
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
