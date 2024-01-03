<hr class="sep article" data-symbol="Articles:">
<!-- Articles -->
<section class="container">
        <div class="linkArticle iota">
            <div>
                <h2 class="center">Ajouter :</h2>
                <div class="buttons">
                    <a href="index.php?route=addArticle" class="btn btn-secondary">Un Article</a>
                    <a href="index.php?route=addExposition" class="btn btn-secondary">Une Exposition</a>
                </div>
            </div>

            <hr>

            <div>
                <h2 class="center">Date importante sur la page d'Accueil</h2>
                <div class="buttons">
                    <a href="index.php?route=addDate" class="btn btn-secondary">Ajouter ou modifier une date</a>
                    <a href="index.php?route=deleteDate" class="btn btn-danger">Supprimer la date</a>
                </div>
            </div>

            <hr>
        </div>
</section>
<section>
        <h2 class="titleTableArticle center">Tous les articles :</h2>
        <div class="table-responsive">
            <table class="table" data-toggle="table" data-pagination="true" data-search="true" data-locale="fr-FR" >
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Ecrit le</th>
                        <th>Ecrit par :</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $article) { ?>
                    <tr>
                        <td><?= $article->getTitle() ?></td>
                        <td><?= substr(strip_tags($article->getContent(), '<br>'), 0, 150); ?>...</td>
                        <td><?= $article->getDate() ?></td>
                        <td><?= $article->getAuthor() ?></td>
                        <td class="action iota">
                            <a href="index.php?route=article&id=<?= $article->getId(); ?>" class="btn btn-primary">Y Accéder</a>
                            <a href="index.php?route=editArticle&id=<?= $article->getId(); ?>" class="btn btn-secondary">Modifier l'article</a>
                            <a href="index.php?route=editImageArticle&id=<?= $article->getId();?>" class="btn btn-secondary">Modifier l'image</a>
                            <a href="index.php?route=deleteArticle&id=<?= $article->getId(); ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
</section>

<!-- Catégorie -->
<hr class="sep category" data-symbol="Catégories:">

<section class="center category container">
    <table class="table" data-toggle="table" data-pagination="true" data-search="true" data-locale="fr-FR" >
        <thead>
            <tr>
                <th>Catégories</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($categories as $category){?>
            <tr>
                <?php if($category->getId() == 1){?>
                    <td><?= $category->getName(); ?></td>
                    <td>Impossible de le supprimer</td>

                <?php }else{ ?>

                    <td><?= $category->getName(); ?></td>
                    <td><a href="index.php?route=deleteCategory&categoryId=<?= $category->getId();?>" class="btn btn-danger supCategory">Supprimer</a></td>
            </tr>
                <?php }
        } ?>
        <tr>
            <form action='index.php?route=addCategory' method="post" class="iota row">
                <div class="">
                    <td><input type="text" name="category" id="category" class="category"></td>
                </div>
                <td><button class="btn btn-secondary" type="submit" name="submit" value="Ajouter">Ajouter</button></td>
            </form>
        </tr>

        </tbody>
    </table>
</section>

<!-- Commentaires signalés -->
<hr class="sep commentary" data-symbol="Commentaire(s):">

<section class="center flex-center commentary">
    <?php
        if (empty($comments)) {
            echo '<p>' . 'Aucun commentaire signalé' . '</p>';
        } else {
    ?>
    <h2 class='commentary'>Commentaires signalés:</h2>
    <table data-toggle="table" data-pagination="true" data-search="true" data-locale="fr-FR">
		<thead>
            <tr>
                <th>Pseudo</th>
                <th>Commentaire</th>
                <th>Date</th>
                <th>Actions</th>
			</tr>
		</thead>
		<tbody>
            <?php
            foreach ($comments as $comment) {
            ?>
                <tr>
                    <td><?= htmlspecialchars($comment->getName()); ?></td>
                    <td><?= htmlspecialchars(substr($comment->getContent(), 0, 100)); ?></td>
                    <td><?= htmlspecialchars($comment->getDate()); ?></td>
                    <td class="iota">
                        <a href='index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>' class="btn btn-secondary">Désignaler ce commentaire</a>
                        <a href='index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>' class="btn btn-danger">Supprimer ce commentaire</a>
                    </td>
                </tr>


        <?php
            }
        }
		?>
		</tbody>
        </table>
</section>

<!-- Utilisateurs-->
<hr class="sep user" data-symbol="Utilisateurs:">

<section class="user">
    <div class="table-responsive">
    <table data-toggle="table" data-pagination="true" data-search="true" class= >
		<thead>
			<tr>
				<th>Nom</th>
				<th>Email</th>
				<th>Date de création</th>
				<th>Rôle</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
        <?php
        foreach ($users as $user) {
        ?>
            <tr>
                <td><?= htmlspecialchars($user->getName()); ?></td>
                <td><?= htmlspecialchars($user->getEmail()); ?></td>
                <td><?= htmlspecialchars($user->getDateCreated()); ?></td>
                <td><?php
                    if ($user->getRole() == 'admin'){
                        echo 'Administrateur';
                    }
                    else if ($user->getRole() == 'author'){
                        echo 'Auteur';
                    }
                    else{
                        echo 'Utilisateur';
                    }
                ?></td>
                <?php
                if ($user->getRole() != 'admin') {
                ?>
                    <td class="action iota">
                        <?php if($user->getRole() == 'subscriber'){?>
                            <a href="index.php?route=rightAuthor&userId=<?= $user->getId();?>" class="btn btn-secondary">Changer en auteur</a>
                        <?php }else{?>
                            <a href="index.php?route=rightUser&userId=<?= $user->getId();?>" class="btn btn-secondary">Changer en utilisateur</a>
                        <?php }?>
                    </td>
            <?php
                } else {
                    echo '<td>Modification impossible</td>';
                }
            }
            ?>
			</tr>
		</tbody>
    </table>
    </div>
</section>