<?php
$this->title = "Supprimer une catégorie";
$this->css = "littlePage";
?>
<section>
    <hr class="sep category" data-symbol="Suppresion :">
    <div class="all container-fluid">
        <h1 class="center">Voulez vous vraiment supprimer cette catégorie !?</h1>
        <div>
            <h2 class="center uppercase"><i class="fas fa-exclamation-triangle"></i>Attention<i class="fas fa-exclamation-triangle"></i></h2>
            <p class="center">
               Supprimer cette categorie supprimera TOUS LES ARTICLES CORRESPONDANT ! Etes vous sur de supprimer cette catégorie ?
            </p>
        </div>
        <form action="index.php?route=deleteCategory&categoryId=<?= $categoryId?>" method="post">
            <p>
                <label>
                    <input name="deleteCategory" type="radio" value="no"/>
                    <span>NON, Je ne veux pas supprimer la catégorie car je comprends que ceci va supprimer tous les articles correspondants</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="deleteCategory" type="radio" value="yes"/>
                    <span>Oui, je veux supprimer cette catégorie, et je sais que cela va supprimer la TOTALITE des articles de cette catégorie.</span>
                </label>
            </p>

            <div class="iota center">
                <button class="btn btn-tertiary" type="submit" name="submit" value="delete">Supprimer</button>
            </div>
        </form>
        <div class="iota">
            <a href="index.php?route=profile" class="btn btn-primary">Retourner à la page de profil</a>
        </div>
    </div>

</section>