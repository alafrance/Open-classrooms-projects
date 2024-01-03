<?php
$this->css = 'articles';
$this->title = $category;
?>


<section class="container">
    <div class="row">
        <div class="col-lg-8 col-xl-8 col-12 articles">
    <?php foreach ($articles as $article){ ?>
        <article class="center">
            <h2 class="pageCategory"><?= htmlspecialchars($article->getTitle());?></h2>
            <a href="index.php?route=article&id=<?=$article->getId(); ?>">
                <img src='img/articles/<?= $article->getImage();?>' alt= 'Image correspondant à <?=$article->getTitle() ?>' class="col-sm-12 col-md-12 col-lg-7 col-xl-9">
            </a>
            <p class="justify"><?= substr(strip_tags($article->getContent(), '<br>'), 0, 300) ?>...</p>
        </article>
    <?php } ?>
        </div>
        <aside class="col-4">
            <h2 class="center category">Catégorie</h2>
            <?php foreach($categories as $category){ ?>
                <h3><a href='index.php?route=category&id=<?= $category->getId();?>'><?= $category->getName(); ?></a></h3>
            <?php foreach ($articles as $article){
                if ($article->getCategory() == $category->getName()){ ?>
                <p><a href='index.php?route=article&id=<?= $article->getId();?>'><?= $article->getTitle();?></a></p>
            <?php
                    }
                }
            }
            ?>
            <h3><a href="index.php?route=articles">Tous les articles</a></h3>
        </aside>
    </div>
</section>