<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Filmu valdymo puslapis</title>

    <!-- My CSS -->
    <link href="/php_film_website/templates/main/css/styles.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/04b00d367c.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="/php_film_website/templates/main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/php_film_website/templates/main/css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

<div class="d-flex" id="wrapper">
<?php include "_partials/header.view.php"?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <?php include "_partials/nav.view.php"?>
        <main class="container-fluid">
            <?php
            // echo $_SERVER['DOCUMENT_ROOT'].'/php_film_website/router.php';
            require ($_SERVER['DOCUMENT_ROOT'].'/php_film_website/router.php')
            ?>
        </main>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="/php_film_website/templates/main/js/jquery.min.js"></script>
<script src="/php_film_website/templates/main/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>