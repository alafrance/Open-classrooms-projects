<?php
$this->css = 'littlePage';
$this->title = "Paramètre";
?>
<section>
    <hr class="sep category" data-symbol="Paramètre:">
    <div class="container-fluid">
        <h1 class="setting uppercase center">Changer :</h1>
        <ul class="row">
            <li class="col-4"><a href="index.php?route=updatePassword" class="btn btn-secondary">Mot de passe</a></li>
            <li class="col-4"><a href="index.php?route=updateEmail" class="btn btn-secondary">Email</a></li>
            <li class="col-4"><a href="index.php?route=updateName" class="btn btn-secondary">Nom</a></li>
        </ul>
        <hr>

            <ul>
                <li><a href="index.php?route=logout" class="btn btn-secondary">Se déconnecter</a></li>
            </ul>
            <ul>
                <li><a href="index.php?route=profile" class="btn btn-secondary">Retourner sur la page de profil</a></li>
            </ul>
            <?php if ($_SESSION['role'] != 'admin'){?>
                <ul>
                    <li><a href="index.php?route=deleteAccount" class="btn btn-danger">Supprimer son compte</a></li>
                </ul>
            <?php }?>
        </div>

    </div>
</section>
