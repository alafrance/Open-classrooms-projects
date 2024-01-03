<hr id="four" data-symbol="Articles :">
<section class="allsize">
    <div class="linkArticle">
        <h2 class="center">Vous pouvez ajouter :</h2>
        <div class="row">
            <a href="index.php?route=addArticle" class="btn btn-secondary col-4 mr-3">Un article</a>
            <a href="index.php?route=addExposition" class="btn btn-secondary col-4">Une exposition</a>
        </div>
    </div>
    <h2 class="titleAllArticleAuthor">Vos articles</h2>
    <?php if($articles == NULL){?>
        <div>
            <p>Vous n'avez écrit encore aucun article ! Ecrivez en un !</p>
        </div>
    <?php }else{?>
        <table class="table" data-toggle="table" data-pagination="true" data-search="true" data-locale="fr-FR" >
        <thead>
            <tr>
                <td>Titre</td>
                <td>Contenu</td>
                <td>Date :</td>
                <td>Actions :</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach($articles as $article){?>
                <tr>
                    <td><?= $article->getTitle();?></td>
                    <td><?= substr(strip_tags($article->getContent()), 0, 100);?>...</td>
                    <td><?= $article->getDate();?></td>
                    <td class="actions iota">
                        <a href="index.php?route=article&id=<?= $article->getId();?>" class="btn btn-primary">Accéder à l'article</a>
                        <a href="index.php?route=editArticle&id=<?= $article->getId();?>" class="btn btn-secondary">Modifier l'article</a>
                        <a href="index.php?route=editImageArticle&id=<?= $article->getId();?>" class="btn btn-secondary">Modifier l'image</a>
                        <a href="index.php?route=deleteArticle&id=<?= $article->getId();?>" class="btn btn-danger">Supprimer l'article</a>
                    </td>
                </tr>
        <?php }
        }?>
        </tbody>
    </table>

</section>