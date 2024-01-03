<?php
$this->title  = 'Inscription / Connexion';
$this->css = 'login';
?>
<section>
    <div class='container center middle'>
        <h1>Inscrivez vous !</h1>
        <form method="post" action="../public/index.php?route=register">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
            <?= isset($errors['pseudo']) ?  $errors['pseudo'] : ''; ?>

            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <p class="italic normal">Le mot de passe doit contenir au minimum :</p>
            <ul>
                <li>Une majuscule</li>
                <li>Un chiffre</li>
                <li>8 caractères</li>
            </ul>
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>

            <label for="password">Confirmer mot de passe</label><br>
            <input type="password" id="password2" name="password2"><br>
            <?= isset($errors['password2']) ? $errors['password2'] : ''; ?>

            <label for="email">Email</label><br>
            <input type='email' id="email" name="email"><br>
            <?= isset($errors['email']) ? $errors['email'] : ""; ?>

            <input type="submit" value="Inscription" id="submit" name="submit" class="button button-secondary">
        </form>
        <h2>Vous avez déja un compte ?</h2>
        <a class="button button-tertiary" href="../public/index.php?route=login"> Se Connectez</a>
    </div>
</section>


