<div id="textfield">
    <p>Onze merken in nachtmode:</p>
    <br />
    <p>
        <?php print isset($brands) ? $brands->getContent() : ''; ?>
    </p>
    <br />
    <p>Hieronder ziet u alvast een greep uit onze collectie:</p>
</div>

<div id="imgList">
    <?php showImages($imgs); ?>
</div>