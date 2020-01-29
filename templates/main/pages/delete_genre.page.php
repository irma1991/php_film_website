<h2>Zanro istrynimas</h2>
<?php session_start();
if($_SESSION['vardas'] == "admin"):
?>
<?php
connectionDB();
$zanras = deleteGenre($_GET['id']);
deleteGenre2();
?>

<div class="container add-film">
    <form method="post" class = "add-film-form">
        <div class="alert alert-danger" role="alert">Ar tikrai norite istrinti zanra?</div>
        <div class="form-group">
            <label for="id">Zanro ID</label>
            <input type="text" class="form-control" id="id" name="id"  value="<?=$zanras['id']; ?>">
        </div>
        <div class="form-group">
            <label for="pavadinimas">Zanro pavadinimas</label>
            <input type="text" class="form-control" id="pavadinimas" name="pavadinimas"  value="<?=$zanras['pavadinimas']; ?>">
        </div>
        <div class="form-group add-film-button">
            <a href="?page=zanru-valdymas" class="btn btn-success">Atsaukti</a>
            <button type="submit" name="submit" class="btn btn-danger">Istrinti</button>
        </div>
    </form>
</div>
<?php else:?>
    <?php header('Location:'.path.'?page=prisijungti'); ?>
<?php endif;?>


