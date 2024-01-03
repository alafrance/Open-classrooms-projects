<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/i1vac04eruqfh6j3cqqaplbmyvmx3i9243xiqsbadqnssub6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script defer src='js/tiny.js'></script>
    <script defer src='js/fr_FR.js'></script>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Materialize -->
    <link rel="stylesheet" href="../config/materialize/sass/materialize.css">
    <script src="../config/materialize/js/bin/materialize.js"></script>
    <script src="js/select.js"></script>

    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="../config/datepicker/src/DateTimePicker.css" />
    <script type="text/javascript" src="../config/datepicker/src/DateTimePicker.js"></script>
    <script src="../config/datepicker/dist/i18n/DateTimePicker-i18n-fr.js"></script>
    <script src="../public/js/date.js"></script>

    <!-- Style -->
    <link rel="stylesheet" href="../public/css/<?=$css?>.css">


</head>
<body>
    <?php include '../view/nav.php'?>
    <main>
        <?= $content ?>
    </main>
    <?php include '../view/footer.php'; ?>
    <script src="js/alert.js"></script>


</body>
</html>

