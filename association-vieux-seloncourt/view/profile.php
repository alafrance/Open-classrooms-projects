<?php
$role = $this->session->get('role');
$this->title = "Page profil";

if ($role == 'admin'){
    $this->css = 'admin';
}else if ($role == 'author'){
    $this->css = 'author';
}else{
    $this->css = 'profile';
}
?>

<!-- Page de profil commune -->
<section class="allsize profileInformation">
    <?= $this->session->showAlert('modify', 'success'); ?>
    <?= $this->session->showAlert('add_article', 'success'); ?>
    <?= $this->session->showAlert('add_category', 'success'); ?>
    <?= $this->session->showAlert('add_date', 'success'); ?>
    <?= $this->session->showAlert('edit_article', 'success'); ?>
    <?= $this->session->showAlert('edit_name', 'success'); ?>
    <?= $this->session->showAlert('edit_email', 'success'); ?>
    <?= $this->session->showAlert('edit_password', 'success'); ?>
    <?= $this->session->showAlert('delete_article', 'error'); ?>
    <?= $this->session->showAlert('delete_date', 'error'); ?>
    <?= $this->session->showAlert('delete_category', 'error'); ?>
    <?= $this->session->showAlert('delete_user', 'error'); ?>
    <?= $this->session->showAlert('change_right', 'success'); ?>
    <?= $this->session->showAlert('edit_image_article', 'success'); ?>
    <h1 class="title">Bienvenue!</h1>
    <div class="informationsWithText">
        <p>Vous pouvez voir ici vos informations:</p>
        <ul class="informations flex-center">
            <li><i class="fas fa-user"></i>Nom : <?= $this->session->get("name") ?></li>
            <li><i class="fas fa-envelope"></i>Email : <?= $this->session->get("email") ?></li>
            <li><i class="fas fa-key"></i>Mot de passe : ********</li>
            <li>Accéder à votre <a href="index.php?route=setting">paramètre<i class="fas fa-user-cog"></i></a></li>
            <?php if ($role != 'author' && $role != 'admin'){?>
            <li>Grâce à votre inscription, vous pouvez ajouter des commentaires !</lip>
            <?php }?>
        </ul>

    </div>

</section>

<?php
// Page de profil auteur
    if($role === 'author'){
        require 'administration/author.php';
    }
?>
<?php
//Page de profil administrateur
    if($role === 'admin'){
        require 'administration/admin.php';
    }
?>