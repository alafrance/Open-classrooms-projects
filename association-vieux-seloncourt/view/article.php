<?php
$this->css = "article";
$this->title = $article->getTitle();
?>

<section class="container center">
    <h1><?= $article->getTitle(); ?></h1>
    <img src='img/articles/<?= $article->getImage();?>' alt= 'Image correspondant à $article->getTitle()' class="col-xl-9 col-lg-9">
    <p><?= $article->getContent();?></p>
    <hr>
    <p class="italic info"><?= $article->getAuthor();?>, Crée le <?= $article->getDate();?> </p>
    <p>Catégorie : <?= $article->getCategory();?></p>
</section>

<section class='commentary'>

    <h1>Commentaires</h1>
    <?php if(isset($_SESSION['name'])) {?>
        <form action="index.php?route=addComment&articleId=<?= $articleId ?>" method="post">
            <div class="input-field">
                <input type="text" name="content" id="content" class="validate">
                <label for="content">Ajouter un commentaire </label>
                <?= isset($errors['content']) ? $errors['content'] : ''; ?>
            </div>
            <div>
                <button class="btn btn-secondary" type="submit" name="submit" value="add">Ajouter</button>
            </div>
        </form>
        <?= isset($errors['content']) ? $errors['content'] : '';?>
    <?php } else{ ?>
        <p>Si vous voulez ajouter un commentaire, veuillez vous <a href="index.php?route=login" class="btn btn-secondary">connecter</a></p>
    <?php  } ?>



    <?php foreach($comments as $comment){ ?>
        <h3><?= $comment->getName(); ?></h3>
        <p><?= $comment->getContent(); ?></p>
        <p><?= $comment->getDate(); ?></p>
        <p><?php
            if (isset($_SESSION['name']) && ($_SESSION['role'] == 'author' || $_SESSION['role'] == 'admin')){ ?>
            <a href="index.php?route=flagComment&commentId=<?= $comment->getId();?>" class="signale">Signaler le commentaire</a>
        <?php } ?>
        </p>
            <hr>
    <?php } if (empty($comments)){ ?>
            <p>Aucun commentaire. Soyer le premier à écrire !</a></p>
    <?php }?>
</section>