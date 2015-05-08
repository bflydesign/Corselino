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