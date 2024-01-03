<?php
$this->title = "Nouvel article";
$this->css = "administration";
?>
<section>
    <form method="post" action="../public/index.php?route=addExposition" class="center" enctype="multipart/form-data">

        <div class="titleAndChapter">
            <div class="input-field">
                <input type="text" name="title" id="title" class="validate" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>">
                <label for="title">Titre de l'Exposition </label>
                <?= isset($errors['title']) ? $errors['title'] : ''; ?>
            </div>
            <div class="file-field input-field">
                <p class="info">Ajouter l'image</p>
                <div>
                    <span class="btn btn-gray">Image</span>
                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
                <div id="preview-file"></div>
                <?= isset($errors['image']) ? $errors['image'] : ''; ?>
            </div>
        </div>

        <div class="content">
            <label for="content">Contenu</label><br>
            <?= isset($errors['content']) ? $errors['content'] : ''; ?>
            <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
        </div>
        <div class="iota center">
            <button class="btn btn-secondary" type="submit" name="submit" value="add">Ajouter</button>
        </div>
    </form>
</section>
