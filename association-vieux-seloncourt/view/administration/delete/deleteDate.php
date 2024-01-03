<?php
$this->title = "Supprimer  une date";
$this->css = "littlePage";
?>
<section>
    <hr class="sep category" data-symbol="Suppresion">
    <div class="all container-fluid">
        <h1 class="center">Voulez vous vraiment supprimer la date ? Elle ne sera plus disponible</h1>
        <form action="index.php?route=deleteDate" method="post">
            <input type="hidden" name="id" value="<?= $id?>">
            <p>
                <label>
                    <input name="deleteAccount" type="radio" value="no"/>
                    <span>NON, Je ne veux pas supprimer la date</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="deleteAccount" type="radio" value="yes"/>
                    <span>Oui, je veux supprimer la date</span>
                </label>
            </p>

            <div class="iota center">
                <button class="btn btn-secondary" type="submit" name="submit" value="delete">Valider</button>
            </div>
        </form>
        <div class="iota">
            <a href="index.php?route=profile" class="btn btn-primary">Retourner à la page de profil</a>
        </div>
    </div>
</section>