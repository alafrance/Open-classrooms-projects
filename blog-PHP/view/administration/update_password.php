<?php
$this->title = 'Modifier mot mot de passe';
$this->css = 'updatePassword'
?>
<section class="middle">
    <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p>
    <?php include '../view/forms/form_password.php'?>
    <a href="../index.php?route=profile" class="button button-primary">Retourner à la page membre</a>
</section>