<?php
$this->title = "Accueil";
$this->css = "home";
?>
<section id="slideshow">
<?= $this->session->showAlert('flag_comment', 'success'); ?>
<?= $this->session->showAlert('delete_comment', 'success'); ?>
<?= $this->session->showAlert('register', 'success'); ?>
<?= $this->session->showAlert('login', 'success'); ?>
<?= $this->session->showAlert('logout', 'success'); ?>
<?= $this->session->showAlert('delete_account', 'success'); ?>
    <div class="title">
        <h1 class="titleh1">Bienvenue sur le blog de <span>Jean Forteroche</span></h1>
        <p>Vous pourrez y lire son roman "billet simple pour l'Alaska"</p>
        <a  class="button button-secondary" href="../public/index.php?route=novel" id="linkNovel">Accéder au roman</a>
    </div>
    <div class="container-slider">
        <div id="slider">
            <div class="img-slide">
                <img src="img/slider/snow.jpg" alt="Image slider forêt enneigé">
            </div>
            <div class="img-slide">
                <img src="img/slider/winterIsComing.jpg" alt="Image slider maison et route enneigé">
            </div>
            <div class="img-slide">
                <img src="img/slider/alaska-baleines.jpg" alt="Image slider baleine alaska">
            </div>

        </div>
    </div>
</section>


<section id="novel">
    <h1 class='underline uppercase center titleColor2'>Billet simple pour l'alaska</h1>
    <div class="allChapter">
<?php
        $i = 1;
        while ($i != 4){
?>
            <div class="chapter">
                <a href="../public/index.php?route=article&id=<?= $articles[$i]->getId()?>" class="scale">
                    <h2 class="capitalize underline center titleColor2"> Chapitre <?= $i ?> : <?= $articles[$i]->getTitle();?></h2>
                    <img src="../public/img/blog/<?= $articles[$i]->getImage()?>" alt="image chapitre <?= $i?>">
                </a>
            </div>
<?php
        $i++;
        }
?>
    </div>
    <div class="allSize center">
        <a class="buttonAllChapter button button-secondary center" href="../public/index.php?route=novel">Voir tous les chapitres</a>

    </div>
    
</section>

<section id="biography">
    <h1 class="uppercase underline">biographie</h1>
    <img src="img/portrait.jpg" alt="Portrait Jean Forteroche">
    <div class="pinched">
        <p>
            Jean Forteroche est né le 13 juillet 1985.
            Il est écrivan et a écrit de nombreux livres.
            Mais son livre "Billet simple pour l'Alaska" est le livre qu'il a mis le plus de temps à écrire. Plus de deux ans.
            Car il est allé en Alaska pour écrire son livre. Il voulait les meilleurs conditions possibles.
            Et un jour, Jean Forteroche a décidé de publier son roman en ligne. Et vous voici sur son blog.
            Mais pas de panique ! Vous pourrez le lire en format papier dès sa sortie (28 juin 2020).
        </p>
    </div>
</section>


