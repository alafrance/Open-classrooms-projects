<?php
$this->title = "Article";
$this->css = 'single';
?>

<section class="single container">
    <?= $this->session->showAlert('add_comment', 'success'); ?>
    <article id="single">
        <h2 class="center underline"><?= htmlspecialchars($article->getTitle());?></h2>
        <img src="../public/img/blog/<?= $article->getImage();?>" alt="image chapitre" class="col-lg-12 col-xl-10 col-md-12 col-sm-12">
        <?= $article->getContent();?>
        <p class="author"><?= htmlspecialchars($article->getAuthor());?></p>
        <p class="date">Créé le : <?= htmlspecialchars($article->getDate());?></p>
    </article>
    <div id='comment'>

<?php
        if ($this->session->get('pseudo')){
            echo '<h2 class="underline">Ajouter un commentaire</h2>';
            include('forms/form_comment.php');
        }
?>

        <div id="comments">
            <h3 class="underline">Commentaires</h3>
<?php
        if (empty($comments)){
            echo '<p>Aucun commentaire. Soyez le premier à écrire !</p>';
        }
        foreach ($comments as $comment)
        {
?>
            <h4 class="uppercase"><?= htmlspecialchars($comment->getPseudo());?></h4>
            <p><?= htmlspecialchars($comment->getContent());?></p>
            <p class="date">Posté le <?= htmlspecialchars($comment->getDate());?></p>
<?php
            if($comment->isFlag()) {
                echo '<p>Ce commentaire a déjà été signalé</p>';
            } else {
?>
                <p><a href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
<?php
            }
            echo '<hr>';
    }
?>
        </div>
    </div>


</section>

