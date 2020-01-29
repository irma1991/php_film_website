<?php session_start();
if($_SESSION['vardas'] == "admin"):
?>
<?php
connectionDB();
$filmas = updateFilm($_GET['id']);
updateFilm2();

?>
<h2>Filmo redagavimas</h2>
<div class="container add-film">
    <form method="post" class = "add-film-form">
        <div class="form-group">
            <label for="id">Filmo id</label>
            <input type="text" class="form-control" id="id" name="id"  value="<?=$filmas['id']; ?>">
        </div>
        <div class="form-group">
            <label for="pavadinimas">Filmo pavadinimas</label>
            <input type="text" class="form-control" id="pavadinimas" name="pavadinimas"  value="<?=$filmas['pavadinimas']; ?>">
        </div>
        <div class="form-group">
            <label for="aprasymas">Aprasymas</label>
            <input type="text" class="form-control" id="aprasymas" name="aprasymas" value="<?=$filmas['aprasymas']; ?>">
        </div>
        <div class="form-group">
            <label for="metai">Filmo metai</label>
            <input type="text" class="form-control" id="metai" name="metai"  value="<?=$filmas['metai']; ?>">
        </div>
        <div class="form-group">
            <label for="rezisierius">Rezisierius</label>
            <input type="text" class="form-control" id="rezisierius" name="rezisierius" value="<?=$filmas['rezisierius']; ?>">
        </div>
        <div class="form-group">
            <label for="ivertinimai">Ivertinimai</label>
            <input type="text" class="form-control" id="imdb" name="imdb" value="<?=$filmas['imdb']; ?>">
        </div>
        <div class="form-group">
            <label for="zanras">Filmo zanras</label>
            <input type="text" class="form-control" id="zanras" name="zanras"  value="<?=$filmas['zanroPavadinimas']; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="zanroID" name="zanroID"  value="<?=$filmas['zanro_id']; ?>">
        </div>
        <div class = "add-film-button">
            <button type="submit" name="submit" class="btn btn-secondary">Patvirtinti</button>
        </div>
    </form>
</div>
<?php else:?>
    <?php header('Location:'.path.'?page=prisijungti'); ?>
<?php endif;?>