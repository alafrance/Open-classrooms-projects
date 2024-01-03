<?php
$this->css = 'home';
$this->title = 'Accueil';
?>
<?= $this->session->showAlert('logout', 'normal');?>
<header class="slider flex-center">
    <nav class="navbar">
        <a href="index.php"><img src="img/logo.png" alt="logo les Amis du Vieux Seloncourt" class="logo"></a>
        <div class="hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <ul class="nav-links">
            <li><a href="index.php" class="text">Accueil</a></li>
            <li><a href="index.php?route=articles" class="text">Articles</a></li>
            <li><a href="index.php?route=contact" class="text">Contact</a></li>
        <?php if (isset($_SESSION['name'])){ ?>
            <li><a href="index.php?route=profile" class="text">Profil</a></li>
        <?php }else{ ?>
            <li><a href="index.php?route=login" class="text">Se connecter</a></li>
        <?php  } ?>
        </ul>
    </nav>

    <div class="flex-center top">
        <h1>Les Amis du Vieux Seloncourt</h1>
        <p>Association de sauvegarde du patrimoine historique, culturel et cultuel de Seloncourt</p>
        <div>
            <a href="#description" class="button light first">Qui sommes nous ?</a>
            <a href="index.php?route=contact" class="button light first">Nous contacter</a>
            <a href="#event" class="button light">Evenements à venir</a>
        </div>
    </div>
    <img src="img/home/tvh.jpg" class="fond"></img>
</header>

<?php if (!empty($date->getId())){?>
    <section class="date container-fluid" id="event">
        <h1 class="center uppercase">Evenements à venir</h1>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-12 flex-center">
                <p>L'assocation organise un <?= $date->getTitle()?></p>
                <p>Date : <?= $date->getDate();?> à <?=$date->getPlace(); ?> </p>
                <?php if (!empty($date->getContent())){?>
                    <p><?= strip_tags($date->getContent(), '<br>')?></p>
                <?php }?>
            </div>
            <img src="img/date/<?= $date->getImage();?>"" alt="Image Correspondant à l'evenement à venir" class="col-lg-6 col-xl-6 col-12">
        </div>
    </section>
    <hr class="home">
<?php }?>


<section class="description container-fluid center" id="description">
    <h1>Qui sommes nous ?</h1>
    <div class="row">
        <figure class="col-xl-5 col-lg-6 col-md-6 flex-center">
            <img src="img/home/espace_kieffer_2_black.jpg" class="">
            <figcaption>Nos locaux à Seloncourt</figcaption>
        </figure>
        <div class="col-xl-7 col-lg-6 col-md-6 flex-center">
            <p>
                La création de  l’association de sauvegarde du patrimoine historique, culturel et cultuel, «les Amis du vieux Seloncourt» en 1984 est liée à l’histoire de la vieille église de la commune.<br>
                A cette époque, l’édifice, dont les parties anciennes datent du XIIe siècle, nécessitait des travaux importants, notamment la mise hors d’eau de la toiture et du clocher.<br><br>
            <p class="laptop">
                Cette restauration ne pouvant être assurée par la paroisse, propriétaire de l'édifice, quelques bénévoles se rassemblèrent pour créer l’association et assurer la renovation de la vieille église de 1985 à 1992.<br>
                10 ans après,  l’association ouvre l’espace « Charles Kieffer » consacré à la sauvegarde des traditions et de l’horlogerie, en hommage à un des membres fondateurs de l’association<br>
            </p>
            <div>
                <a href="index.php?route=contact" class="button dark first">En savoir plus sur nous</a>
                <a href="index.php?route=contact#contact" class="button dark">Nous contacter</a>
            </div>
        </div>
    </div>
</section>

<hr class="home"> 

<?php if ($exposition->getImage() != NULL && $exposition->getTitle() != NULL && $exposition->getContent() != NULL){?>
<section class="exposition flex-center container-fluid">
    <h1 class="center">Derniere Exposition: <?= $exposition->getTitle()?></h1>
    <div class="center expositionContent">
        <p class="content laptop center "><?= substr(strip_tags($exposition->getContent(), '<br>'), 0, 600) ?>...</p>
        <p class="content mobile justify "><?= substr(strip_tags($exposition->getContent(), '<br>'), 0, 300) ?>...</p>
        <img src="img/articles/<?= $exposition->getImage()?>" alt="Image dernière exposition" class="col-xl-8 col-md-12 col-12 center">
    </div>
    <a href="index.php?route=article&id=<?= $exposition->getId();?>" class="button dark">Voir l'exposition en entier</a>
</section>
<?php }?>

<hr class="home">


<section class='articles container-fluid'>
    <h1 class="center">Les derniers articles</h1>
    <div class="row">

<?php
    foreach($articles as $article){
?>
            <article class="col-xl-4 col-sm-12 col-lg-4 col-md-12">
                <div class="title">
                    <h2><?= $article->getTitle();?></h2>
                </div>
                <div class="image flex-center">
                    <a href="index.php?route=article&id=<?= $article->getId();?>">
                        <img src='img/articles/<?=$article->getImage()?>' alt='Image Article <?= $article->getTitle();?>'>
                    </a>
                </div>
                <div class="content">
                    <a href="index.php?rtoue=article&id=<?= $article->getId();?>"><p><?= substr(strip_tags($article->getContent(), '<br>'), 0, 300) ?>...</p></a>
                </div>
            </article>
<?php
    }
?>
    </div>
    <div class="footer center">
        <a href="index.php?route=articles" class="button dark">Cliquez ici pour accéder à tous nos articles</a>
    </div>

</section>


