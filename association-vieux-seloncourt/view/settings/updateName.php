<?php
$this->css = 'littlePage';
$this->title = "Changer paramètre";
?>
<section >
    <h1 class="center">Vous voulez modifier votre nom, autre qu'à la mairie et uniquement sur ce site ? C'est ici :</h1>
    <div class="all container-fluid">
        <p class="center oldEmail">Votre ancien nom : <?= $_SESSION['name']?></p>
        <form action="index.php?route=updateName" method="post" class="row">
            <div class="input-field">
                <input type="text" name="name" id="name" class="validate">
                <label for="name">Nouveau nom :</label>
            </div>
            <div class="iota center emailButton">
                <button class="btn btn-secondary" type="submit" name="submit" value="add">Modifier</button>
            </div>
        </form>
        <div class="iota">
            <p><a href="index.php?route=setting" class="btn btn-primary">Retourner au paramètre</a></p>
        </div>
    </div>
</section>
