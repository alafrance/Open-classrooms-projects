<nav class="navbar navbar-expand-lg navbar-light" id="naviguation">
    <a href="../public/index.php" id="blog">Billet simple pour l'Alaska</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav">
            <li class="nav-item " >
                <a class="nav-link" href="../public/index.php" id="home">Accueil</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../public/index.php?route=novel" id="chapter">Mes chapitres</a>
            </li>
<?php
            if ($this->session->get('pseudo')){
?>
                <li class="nav-item ">
                    <a class="nav-link" href='../public/index.php?route=profile' id="profile">Profil</a>
                </li>
<?php
                if($this->session->get('role') === 'admin') {
?>
                    <li class="nav-item ">
                        <a class="nav-link" href="../public/index.php?route=administration" id="admin">Administration</a>
                    </li>
<?php
                }
            }else {
?>
                <li class="nav-item ">
                    <a class="nav-link" href="../public/index.php?route=login" id="backend">Inscription/ Connexion</a>
                </li>
<?php
            }
?>
        </ul>
    </div>
</nav>
