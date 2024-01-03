<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/ddc2bafeff.js" crossorigin="anonymous"></script>

    <!-- Style-->
    <link rel="stylesheet" href="../public/css/<?=$css?>.css">

    <!-- Materialize -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="../config/materialize/sass/materialize.css">

    <!-- Compiled and minified JavaScript -->
    <script src="../config/materialize/js/bin/materialize.js"></script>

    <script src="js/alert.js"></script>

</head>
<body>
    <?= $content ?>
    <?php include '../view/footer.php'; ?>
    <script src="js/nav.js"></script>


</body>
</html>

