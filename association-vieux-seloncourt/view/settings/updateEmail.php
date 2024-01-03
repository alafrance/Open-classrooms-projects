<?php
$this->css = 'littlePage';
$this->title = "Changer paramètre";
?>
<section >
    <h1 class="center">Pour modifier son email, veuillez remplir ce formulaire:</h1>
    <div class="all container-fluid">
        <p class="center oldEmail">Votre ancien e-mail : <?= $_SESSION['email']?></p>
        <form action="index.php?route=updateEmail" method="post" class="row">
            <div class="input-field">
                <input type="email" name="email" id="email" class="validate">
                <label for="email">Nouveau mail :</label>
                <?= isset($errors['email']) ? $errors['email'] : '' ?>
                <?= isset($errors['alreadyExist']) ? $errors['alreadyExist'] : '' ?>
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