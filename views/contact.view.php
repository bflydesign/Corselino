<div id="contactform">
    <form id="mailform" action="#" method="post">

        <p id="successmessage" class="succes hidden">Uw bericht werd verzonden, wij reageren zo snel mogelijk</p>
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
        <img src="components/captcha/image.php" alt="Click to reload image" title="Click to reload image" name="captcha" id="captcha" onclick="javascript:reloadCaptcha()" />
        <input type="text" id="inputcaptcha" name="inputcaptcha" />
        <input type="submit" name="confirm" id="confirm" value="* VERSTUREN" class="button" />
        <br />
    </form>
</div>

<div id="info">
    <h2>Openingsuren</h2>
    <p>Open van maandag tot zaterdag</p>
    <p>10u tot 12u30</p>
    <p>14u tot 18u30</p>
    <h3>Gesloten op zondag en maandagvoormiddag</h3>
    <a href="https://maps.google.be/?ll=51.072834,2.664021&spn=0.001318,0.003074&t=m&z=19&iwloc=lyrftr:m,7867411073410667385,51.072736,2.663903" target="_blank" />
    <img src="css/googlemaps_64.png" alt="googlemaps" />
    </a>
</div>