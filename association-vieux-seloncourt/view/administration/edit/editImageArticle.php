<?php
$this->css = 'littlePage';
$this->title = 'Modification image Article';
?>
<section>
    <h1 class="center">Vous voulez modifier l'image de l'article <?= $article->getTitle(); ?> ?</h1>
    <div class="all container-fluid">
        <p>Ancienne image :</p>
        <img src="img/articles/<?= $article->getImage();?>" class="imgPreview col-xl-4 col-lg-4 col-8"></img>
        <p class="newImg">Nouvelle image :</p>
        <div id='preview-file'></div>

        <form action="index.php?route=editImageArticle&id=<?= $articleId ?>" method='post' enctype="multipart/form-data" class="changeImg">
            <div class="file-field input-field editImage">
                <div>
                    <span class="btn btn-gray">Image</span>
                    <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="iota center">
                <button class="btn btn-secondary" type="submit" name="submit" value="edit">Modifier</button>
            </div>
        </form>
        <?= isset($errors) ? $errors : '';?>
    </div>

</section>
