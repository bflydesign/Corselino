<div id="textfield">
    <p>Onze merken in badmode:</p>
    <br />
    <p>
        <?php print isset($content) ? $content : ''; ?>
    </p>
    <br />
    <p>Hieronder ziet u alvast een greep uit onze collectie:</p>
</div>

<div id="imgList">
    <?php showImages($imgs); ?>
</div>