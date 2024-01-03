<form method="post" action="../public/index.php?route=updatePassword" class="center">
    <label for='oldpassword'>Ancien mot de passe</label><br>
    <input type="password" id="oldpassword" name="oldpassword"><br>
    <?= isset($errors['isPasswordValid']) ? $errors['isPasswordValid'] . '<br>' : '';?>

    <label for="password">Mot de passe</label><br>
    <input type="password" id="password" name="password"><br>
    <?= isset($errors['password']) ? $errors['password'] . '<br>': ''; ?>

    <label for="password2">Confirmer son mot de passe</label><br>
    <input type="password" id="password2" name="password2"><br>
    <?= isset($errors['passwordEgal']) ? $errors['passwordEgal'] . '<br>' : ''; ?>

    <input type="submit" value="Mettre à jour" id="submit" name="submit" class="button button-secondary center">
</form>