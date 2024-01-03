<?php
$this->title = "Nouvel article";
$this->css = "admin";
?>
<section>
    <h1 class="center">Ajouter une date à la page de l'accueil :</h1>    
    <form method="post" action="../public/index.php?route=addDate" class="container flex-center" enctype="multipart/form-data">
            <div class="input-field">
                <input type="text" name="title" id="title" class="validate" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>">
                <label for="title">Titre de la date </label>
                <?= isset($errors['title']) ? $errors['title'] : ''; ?>
            </div>
            <div class="file-field input-field">
                <p>Choisir l'image affiché à la page d'accueil</p>
                <div>
                    <span class="btn btn-gray">Images</span>
                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
                <div id="preview-file"></div>
                <?= isset($errors['image']) ? $errors['image'] : ''; ?>
            </div>

            <div class="input-field">
                <input type="text" data-field="datetime" readonly id="date" name="date" placeholder="Date" value="<?= isset($post) ? htmlspecialchars($post->get('date')): ''; ?>">
                <div id="dtBox"></div>
                <?= isset($errors['date']) ? $errors['date'] : ''; ?>
            </div>

            <div class="input-field">
                <input type="text" name="place" id="place" class="validate" value="<?= isset($post) ? htmlspecialchars($post->get('place')): ''; ?>">
                <label for="place">Lieu</label>
                <?= isset($errors['place']) ? $errors['place'] : ''; ?>
            </div>
            <div>
                <label for="content">Info en plus : (facultatif)</label><br>
                <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
            </div>
            <div class="iota">
                <button class="btn btn-secondary" type="submit" name="submit" value="Ajouter la date">Ajouter la date</button>
            </div>
    </form>
</section>
