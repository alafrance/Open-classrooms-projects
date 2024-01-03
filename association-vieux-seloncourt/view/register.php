<?php
    $this->css = 'littlePage';
    $this->title = 'Page d\'inscription';
?>

<section class="register flex-center">
    <hr class="sep category" data-symbol="Créer un compte">
    <div class="all container-fluid">
        <h1 class="center">Créer un compte :</h1>
        <form action="index.php?route=register" method="post">
            <div class="input-field">
                <input type="text" name="name" id="name" class="validate" value="<?= isset($post) ? htmlspecialchars($post->get('name')): ''; ?>">
                <label for="name">Ton nom</label>
                <?= isset($errors['name']) ? $errors['name'] : '';?>
            </div>
            <div class="input-field">
                <input type="email" name="email" id="email" class="validate" value="<?= isset($post) ? htmlspecialchars($post->get('email')): ''; ?>">
                <label for="email">Ton email</label>
                <?= isset($errors['email']) ? $errors['email'] : '';?>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" class="validate" value="<?= isset($post) ? htmlspecialchars($post->get('password')): ''; ?>">
                <label for="password">Mot de passe</label>
                <?= isset($errors['password']) ? $errors['password'] : '';?>
            </div>
            <div class="input-field">
                <input type="password" name="password2" id="password2" class="validate" value="<?= isset($post) ? htmlspecialchars($post->get('password2')): ''; ?>">
                <label for="password2">Confirmer du mot de passe:</label>
                <?= isset($errors['password2']) ? $errors['password2'] : '';?>
            </div>
            <div class="iota center">
                <button class="btn btn-secondary" type="submit" name="submit" value="add">S'inscrire</button>
            </div>
        </form>
        <div class="iota center">
            <h2>Vous avez déja un compte ?</h2>
            <p><a href="index.php?route=login" class="btn btn-secondary">Se connecter</a></p>
        </div>
    </div>
</section>


