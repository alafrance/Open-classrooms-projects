<?php
$this->title = 'Mon profil';
$this->css = 'profile';
?>
<section id="profil">
<?= $this->session->showAlert('update_password', "success"); ?>
    <div class="center container middle">
        <h1 class="center underline">Bienvenue <?= $this->session->get('pseudo'); ?></h1>
        <p>Vous voici sur votre page membre. Vous pouvez changer plusieurs paramètres: </p>
        <a  href="../public/index.php?route=updatePassword">Modifier son mot de passe</a><br>
        <a  href='../public/index.php?route=logout'>Déconnexion</a><br>
        <a  href="../public/index.php?route=deleteAccount">Supprimer son compte</a><br>
    </div>
</section>