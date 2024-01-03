<?php
$this->css = 'littlePage';
$this->title = "Changer paramètre";
?>
<section>
    <h1 class="center">Pour modifier son mot de passe, veuillez remplir ce formulaire:</h1>
    <div class="all container-fluid">
        <form action="index.php?route=updatePassword" method="post" class="update" >
            <div class="input-field">
                <input type="password" name="oldPassword" id="oldPassword" class="validate">
                <label for="oldPassword">Ancien mot de passe :</label>
                <?= isset($errors['passwordIsValid']) ? $errors['passwordIsValid'] : ''; ?>
            </div>
            <div class="input-field">
                <input type="password" name="newPassword" id="newPassword" class="validate">
                <label for="newPassword">Nouveau mot de passe :</label>
                <?= isset($errors['newPassword']) ? $errors['newPassword'] : ''; ?>
            </div>
            <div class="input-field">
                <input type="password" name="newPassword2" id="newPassword2" class="validate">
                <label for="newPassword2">Confirmer Nouveau mot de passe :</label>
                <?= isset($errors['passwordEgal']) ? $errors['passwordEgal'] : ''; ?>
            </div>

            <div class="iota center">
                <button class="btn btn-secondary" type="submit" name="submit" value="add">Modifier</button>
            </div>
        </form>
        <div class="iota">
            <p><a href="index.php?route=setting" class="btn btn-primary">Retourner au paramètre</a></p>
        </div>
    </div>

</section>
