<?php
    $this->css = 'littlePage';
    $this->title = 'Changer les droits';
?>

<section>
<hr class="sep category" data-symbol="Changement Droits :">

    <h1 class="center">Voulez vous vraiment changer <?= $user->getName();?> en Auteur ?</h1>
    <div class="all container-fluid">
        <div>
            <h2 class="center">Informations :</h2>
            <p class="center">
                Auteur : Il peut ajouter un article. Il peut aussi modifier et supprimer ces propres articles.<br>
                Vous devez être certain en lui donnant ces droits à cette personne.
            </p>
        </div>
        <form action="index.php?route=rightAuthor&userId=<?=$userId?>" method="post">
            <p>
                <label>
                    <input name="changeRight" type="radio" value="no"/>
                    <span>NON, Je ne veux pas passer <?= $user->getName()?> en auteur à cause des risques</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="changeRight" type="radio" value="yes"/>
                    <span>Oui, je suis CERTAIN et je veux que <?= $user->getName()?> devienne auteur</span>
                </label>
            </p>

            <div class="iota center">
                <button class="btn btn-secondary" type="submit" name="submit" value="modifyRight">Valider</button>
            </div>
        </form>
        <div class="iota">
            <a href="index.php?route=profile" class="btn btn-primary">Retourner à la page de profil</a>
        </div>
    </div>
</section>