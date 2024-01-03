<?php
$this->css = 'update';
$this->title = "Changer paramètre";
?>
<section>
    <h1>Etre vous sur de vouloir supprimer votre compte ? Ceci est DEFINITIF !</h1>
    <form action="index.php?route=deleteAccount" method="post">
        <div>
            <input type="radio" name="deleteAccount" id='notDeleteAccount' value="no">
            <label for="notDeleteAccount">NON, je ne veux surtout pas supprimer mon compte</label>
        </div>

        <div>
            <input type="radio" name="deleteAccount" id="deleteAccount" value="yes">
            <label for="deleteAccount">Oui, je veux supprimer mon compte</label>
        </div>

        <input type="submit" value="Suppresion" name="submit">
    </form>
    <h2>Retourner à la page de profil</h2>
    <a href="index.php?route=profile">Page de profil</a>
</section>
