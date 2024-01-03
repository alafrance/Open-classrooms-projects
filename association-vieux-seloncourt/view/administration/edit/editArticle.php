<?php
$this->title = "Modifier l'article";
$this->css = "administration";
?>
<section>
<form method="post" action="../public/index.php?route=editArticle&id=<?= $id?>" class="center" enctype="multipart/form-data">

    <div class="titleAndChapter">
        <div class="input-field">
            <input type="text" name="title" id="title" class="validate" value="<?= $article->getTitle();?>">
            <label for="title">Titre de l'Article </label>
            <?= isset($errors['title']) ? $errors['title'] : ''; ?>
        </div>
        <div class="input-field">
            <select name="category">
                <option value="<?= $categoryId ?>" selected><?= $article->getCategory(); ?></option>
                <?php foreach($categories as $category){ ?>
                    <?php if ($category->getName() != $article->getCategory()){ ?>
                    <option value="<?= $category->getId();?>"><?= $category->getName();?></option>
                    <?php
                        }
                    }
                    ?>
            </select>
            <label>Catégorie</label>
            <?= isset($errors['category']) ? $errors['category'] : ''; ?>
        </div>

    </div>

    <div class="content">
        <label for="content">Contenu</label><br>
        <?= isset($errors['content']) ? $errors['content'] : ''; ?>
        <textarea id="content" name="content"><?= $article->getContent();?></textarea><br>
    </div>

    <div class="iota center">
        <button class="btn btn-secondary" type="submit" name="submit" value="add">Modifier l'article</button>
    </div>
</form>
</section>