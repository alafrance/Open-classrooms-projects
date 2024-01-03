<?php
$this->title = "Connexion";
$this->css = "login";
?>

<section>

<?= $this->session->showAlert('error_login', 'error');?>
<?= $this->session->showAlert('need_login', 'error');?>

    <div class="middle container center">
        <h2>Se connecter :</h2>
        <form method="post" action="../public/index.php?route=login">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')) : ''; ?>"><br>

            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>

            <input type="checkbox" name="auto" id="automatique">
            <label for="automatique">Connexion automatique</label><br>


            <input type="submit" value="Connexion" id="submit" name="submit" class="button button-secondary">
        </form>
        <h3>Vous n'avez pas encore de compte ?</h3>
        <a href="../public/index.php?route=register" class="button button-secondary">S'inscrire</a>
    </div>
    
</section>


