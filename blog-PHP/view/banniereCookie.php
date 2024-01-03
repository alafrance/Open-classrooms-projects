<?php
if (!isset($_COOKIE['acceptCookie'])){
?>
    <div class="banniere">
        <div class="text-banniere">
            Ce site utilise des cookies pour une meilleure expérience
        </div>
        <div class="button-banniere">
            <a href="../public/index.php?route=acceptCookie" class="button button-primary">Ok j'accepte les cookies</a>
        </div>
    </div>
<?php
}
?>
