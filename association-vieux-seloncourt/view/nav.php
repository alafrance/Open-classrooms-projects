
<nav class="navbar  navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <img src="img/logo.png" alt="logo Vieux Seloncourt" id="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=articles">Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=contact">Contact</a>
        </li>
<?php if (isset($_SESSION['name'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=profile">Profil</a>
        </li>
      <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?route=login">Se connecter</a>
        </li>
      <?php  } ?>
      </ul>
    </div>
  </div>
</nav>