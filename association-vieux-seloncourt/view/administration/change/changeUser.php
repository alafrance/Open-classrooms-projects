<?php
    $this->css = 'littlePage';
    $this->title = 'Changer les droits';
?>

<section>
<hr class="sep category" data-symbol="Changement Droits :">

    <h1 class="center">Voulez vous vraiment changer <?= $user->getName();?> en tant qu'utilisateur ?</h1>
    <div class="all container-fluid">
        <div>
            <h2 class="center">Informations :</h2>
            <p class="center">
                Utilisateur : Il peut seulement écrire des commentaires. La personne ne pourra plus écrire d'article
            </p>
        </div>
        <form action="index.php?route=rightUser&userId=<?=$userId?>" method="post">
            <p>
                <label>
                    <input name="changeRight" type="radio" value="no"/>
                    <span>NON, Je ne veux pas passer <?= $user->getName()?> en tant qu'utilisateur</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="changeRight" type="radio" value="yes"/>
                    <span>Oui, je suis CERTAIN et je veux que <?= $user->getName()?> devienne utilisateur</span>
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