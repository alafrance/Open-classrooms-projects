<?php
$this->title = 'Billet simple pour l\'alaska';
$this->css = "novel";
$i = 0;
?>
<section>
    <h1 class="center">Bienvenue sur la page dédié à "Billet simple pour l'Alaska"</h1>
    <p class="center">Vous pouvez lire n'importe quel chapitre et même commentez !</p>
    <div class="container-fluid novel">
<?php
    foreach ($articles as $article)
    {
        $i += 1;
        ?>
            <article>
                <a href="../public/index.php?route=article&id=<?= $article->getId()?>" class="col-12 chapter scale linkNovel">
                    <h2 class="center underline">Chapitre <?= $i ?> : <?= htmlspecialchars($article->getTitle());?></h2>
                    <img src="../public/img/blog/<?= $article->getImage();?>" alt="image chapitre <?= $i?>" class="col-lg-12 col-xl-10 col-md-12 col-sm-12">
                </a>
            </article>
            <a href="../public/index.php?route=article&id=<?= $article->getId()?>" class="button button-primary">Lire le chapitre</a>
        <?php
    }

?>
    </div>
</section>