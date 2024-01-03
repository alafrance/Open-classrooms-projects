<?php
$this->css = 'littlePage';
$this->title = 'Page de connexion';
?>

<section class="login flex-center">
    <?= $this->session->showAlert('error_login', 'error'); ?>
    <?= $this->session->showAlert('need_login', 'error'); ?>
    <hr class="sep category" data-symbol="Connexion">
    <div class="all container-fluid">
        <h1 class="center">Connectez vous :</h1>
        <form action="index.php?route=login" method="post">
            <div class="input-field">
                <input type="email" name="email" id="email" class="validate" value="<?= isset($post) ? htmlspecialchars($post->get('email')): ''; ?>">
                <label for="email">Ton addresse mail</label>
            </div>

            <div class="input-field">
                <input type="password" name="password" id="password" class="validate">
                <label for="password">Ton mot de passe</label>
            </div>
            <div class=" center">
                <button class="btn btn-secondary" type="submit" name="submit" value="add">Se connecter</button>
            </div>
        </form>
        <div class="center">
            <h2>Vous n'avez pas de compte ?</h2>
            <p><a href="index.php?route=register" class="btn btn-secondary">S'inscrire</a></p>
        </div>
    </div>
</section>
