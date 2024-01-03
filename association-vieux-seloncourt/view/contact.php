<?php
    $this->css = 'contact';
    $this->title = 'Contact';
?>
<section class="information center container">
    <?= $this->session->showAlert('send_mail', 'success'); ?>
    <h2>Notre comité</h2>
    <p class="comite">
        Le comité est composé de 31 membres<br>
        Président : Pierre RERAT<br>
        Secrétaire : Nicole BONNOT<br>
        Trésorières : Michelle WALZER et Françoise NATHAN
    </p>
    <h1>Notre association</h1>
    <p class="justify">
        La création de  l’association de sauvegarde du patrimoine historique, culturel et cultuel, « les Amis du vieux Seloncourt » en 1984 est liée à l’histoire de la vieille église de la commune.<br>
        A cette époque, l’édifice, dont les parties anciennes datent du XIIe siècle, nécessitait des travaux importants, notamment la mise hors d’eau de la toiture et du clocher.<br>
        Cette restauration ne pouvant être assurée par la paroisse, propriétaire de l'édifice, quelques bénévoles se rassembleèrent pour créer l’association et assurer la renovation de la vieille église de 1985 à 1992.<br><br>
        10 ans après,  l’association ouvre l’espace « Charles Kieffer » consacré à la sauvegarde des traditions et de l’horlogerie, en hommage à un des membres fondateurs de l’association?<br>
        Outre la rénovation de la vieille église, l’association a entrepris de nombreuses campagnes de sauvegarde.<br>
        Citons par exemple la restauration du cimetière des Chevaliers de Cléric (1988) et celle de la vieille fontaine (1990).<br><br>
        En 1991, les Amis du vieux Seloncourt ont reconstitué une copie du tramway de la vallée d’Hérimoncourt (TVH) qui circula dans de nombreuses manifestations notamment pour commémorer le dernier voyage de ce moyen de transport (1932).<br>
        Pour signaler les lieux historiques de Seloncourt, l’association appose depuis 1993 de nombreuses plaques : vieille église, église Saint-Laurent, chapelle de tolérance, fonderie Cuvier, centre culturel de la Stauberie, ancienne poste, station du TVH… En 2012, elle a participé à la restauration des orgues du temple de Seloncourt.<br>
    </p>
    
</section>
<section class="contact">
<div class="container-fluid contact">
    <div class="row">
        <div class="info center col-xl-6 col-lg-6 col-sm-12 col-md-12">
            <h1 class="center">Informations</h1>
            <address class="flex-center">
                <p>
                    <i class="fas fa-search-location"></i> Adresse<br>
                    <span>Espace de sauvegarde Charles Kieffer, 6 rue d'Audincourt</span>
                </p>
                <p>
                    <i class="fas fa-phone"></i> Télephone<br>
                    <span>06 80 54 53 91</span>
                </p>
                <p>
                    <i class="fas fa-envelope"></i> Email<br>
                    <span>bonnot.nicole@bbox.fr</span>
                </p>
                <p>
                    <i class="fas fa-clock"></i> Horaire Ouverture<br>
                    <span>Mercredi de 14h et 17h et à la demande</span>
                </p>
            </address>
        </div>
        <div class="form col-xl-6 col-lg-6 col-sm-12 col-md-12 flex-center">
            <h1 class="center">Contactez nous</h1>
            <form action='index.php?route=contact' method='post' class="formulaire">

                <div class="input-field">
                    <input type="text" name="firstName" id="firstName" class="validate">
                    <label for="firstName">Votre prénom</label>
                    <?= isset($errors['firstName']) ? $errors['firstName'] : ''; ?>

                </div>

                <div class="input-field">
                    <input type="text" name="lastName" id="lastName">
                    <label for="lastName">Votre nom</label>
                    <?= isset($errors['lastName']) ? $errors['lastName'] : ''; ?>

                </div>

                <div class="input-field">
                    <input type="email" name="email" id="email">
                    <label for="email">Votre mail</label>
                    <?= isset($errors['email']) ? $errors['email'] : ''; ?>

                </div>

                <div class="input-field">
                    <textarea name="content" id="content" class="materialize-textarea"></textarea>
                    <label for="content">Votre message</label>
                    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
                </div>

                <p>
                    <label>
                        <input type="checkbox" class="filled-in" checked="checked" name="rgpd" />
                        <span>j'ai lu et j'accepte les conditions d'utilisations du site</span>
                        <?= isset($errors['rgpd']) ? $errors['rgpd'] : ''; ?>
                    </label>
                </p>

                <button class="btn waves-effect waves-light" type="submit" name="submit" value="send">
                    Envoyer <i class="fas fa-paper-plane"></i></i>
                </button>
            </form>
        </div>
    </div>

</div>
</section>