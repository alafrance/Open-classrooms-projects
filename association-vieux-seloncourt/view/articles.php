<?php
    $this->css = 'articles';
    $this->title = 'Actualités';
    $i = 0
?>

<section class="container">
    <div class="row">
        <div class="col-lg-8 col-xl-8 col-12">

            <div class="articles">
                <?php foreach ($articles as $article){ ?>
                    <article>
                        <div class="img center">
                            <h2 class="titleArticle"><?= $article->getTitle();?></h2>
                            <a href="index.php?route=article&id=<?=$article->getId(); ?>" >
                                <img src='img/articles/<?= $article->getImage();?>' alt= 'Image correspondant à $article->getTitle()' class="col-sm-12 col-md-12 col-lg-7 col-xl-9">
                            </a>
                        </div>
                        <p class="category"><?= $article->getCategory();?></p>
                        <a href="index.php?route=article&id=<?=$article->getId(); ?>" >
                            <p class="content"><?= substr(strip_tags($article->getContent(), '<br>'), 0, 300) ?>...</p>
                        </a>
                    </article>
                    <hr>
                <?php } ?>
            </div>
        </div>
        <div class="col-4">
            <aside>
                <h1>Catégories</h1>
                <?php foreach($categories as $category){ ?>
                    <h3><a href='index.php?route=category&id=<?= $category->getId();?>'><?= $category->getName(); ?></a></h3>
                <?php foreach ($articles as $article){
                    if ($article->getCategory() == $category->getName()){ ?>
                    <p><a href='index.php?route=article&id=<?= $article->getId();?>'><?= $article->getTitle();?></a></p>
                <?php
                    $i += 1;
                    if ($i == 4){
                        break;
                    }
                        }
                    }
                }
                ?>
            </aside>
        </div>
    </div>
    
    
</section>

