<div id="textfield">
    <p>Onze merken in lingerie:</p>
    <br />
    <p>
        <?php print isset($content) ? $content : ''; ?>
    </p>
    <br />
    <p>Hieronder ziet u alvast een greep uit onze collectie:</p>
</div>

<div id="lingeriebox">
    <?php
    if (!empty($imgs)) {
        //display images
        foreach ($imgs as $img) {
            $thumb = str_replace("images", "images/thumbs/", $img); ?>
            <div class="lingerie">
                <a class="fancybox" rel="group" href="<?php print $img; ?>">
                    <img src="<?php print $thumb; ?>" class="imglingerie"/>
                </a>;
            </div>
        <?php
        }
    } else { ?>
        <h2>Er werden nog geen foto's aan dit album toegevoegd</h2>
    <?php } ?>
</div>