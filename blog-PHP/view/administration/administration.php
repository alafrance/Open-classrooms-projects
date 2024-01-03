<?php
$this->title = 'Administration';
$this->css = 'administration';
?>

<section>
    <?= $this->session->showAlert('add_article', 'success');?>
    <?= $this->session->showAlert('edit_article', 'success'); ?>
    <?= $this->session->showAlert('delete_article', 'success');?>
    <?= $this->session->showAlert('unflag_comment', 'success');?>
    <?= $this->session->showAlert('delete_user', 'success'); ?>
    <div class="center addArticle">
        <h2 class='center '>Ajouter un Article</h2>
        <a href='../public/index.php?route=addArticle' class='button button-primary '>Ajouter</a>
    </div>
    <div class="miseEnFormeTable center">
        <h2 class="center">Actions Articles</h2>
        <table>
        <tr>
            <td>Chapitre</td>
            <td>Nom du chapitre</td>
            <td>Contenu</td>
            <td>Date de création</td>
            <td>Actions</td>
        </tr>
        <?php
            foreach ($articles as $article)
            {
            ?>
                <tr>
                    <td>Chapitre <?= $article->getNumberChapter();?> :</td>
                    <td><?= htmlspecialchars($article->getTitle());?></td>
                    <td><?= strip_tags(substr($article->getContent(), 0, 100));?>...</td>
                    <td><?= htmlspecialchars($article->getDate());?></td>
                    <td>
                        <a href='../public/index.php?route=article&id=<?= htmlspecialchars($article->getId());?>' class="button button-secondary">Accéder à l'article</a><br>
                        <a href="../public/index.php?route=editArticle&id=<?= $article->getId(); ?>" class="button button-secondary">Modifier</a><br>
                        <a href="../public/index.php?route=deleteArticle&id=<?= $article->getId(); ?>" class="button button-secondary">Supprimer</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>

</section>

<section class='center commentary miseEnFormeTable'>
    <h2 class="center">Commentaires signalés</h2>
    <?php
    if (empty($comments)){
        echo '<p>' . 'Aucun commentaire signalé' . '</p>';
    }else{
?>
        <table>
            <tr>
                <td>Pseudo</td>
                <td>Commentaire</td>
                <td>Date</td>
                <td>Actions</td>
            </tr>
<?php
        foreach ($comments as $comment) {
?>
            <tr>
                <td><?= htmlspecialchars($comment->getPseudo());?></td>
                <td><?=  htmlspecialchars(substr($comment->getContent(), 0, 100));?></td>
                <td><?=  htmlspecialchars($comment->getDate());?></td>
                <td>
                    <a href='../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>' class="button-secondary button">Désignaler ce commentaire</a><br>
                    <a href='../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>' class="button-secondary button">Supprimer ce commentaire</a>
                </td>
            </tr>


<?php
            }
    }
?>
        </table>


</section>

<section class="center miseEnFormeTable user">
    <h2>Utilisateurs</h2>
    <table>
        <tr>
            <td>Pseudo</td>
            <td>Date de création</td>
            <td>Rôle</td>
            <td>Actions</td>
        </tr>
    <?php
    foreach ($users as $user){
    ?>
        <tr>
            <td><?= htmlspecialchars($user->getPseudo());?></td>
            <td><?= htmlspecialchars($user->getDateCreation());?></td>
            <td><?= htmlspecialchars($user->getRole());?></td>
    <?php
        if ($user->getRole() != 'admin'){
    ?>
            <td><a href="../public/index.php?route=deleteUser&userId=<?= $user->getId();?>" class="button button-secondary">Supprimer</td>
    <?php
        }else{
            echo '<td>Suppression impossible</td>';
        }
    }
    ?>
        </tr>
    </table>

</section>

