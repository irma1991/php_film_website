<h2>Filmo istrynimas</h2>
<?php
connectionDB();
$filmas = deleteFilm($_GET['id']);
deleteFilm2();
?>

<div class="container">
    <form method="post">
        <div class="alert alert-danger" role="alert">Ar tikrai norite istrinti filma?</div>
        <div class="form-group">
            <label for="id">Filmo ID</label>
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
            <label for="metai">Metai</label>
            <input type="text" class="form-control" id="metai" name="metai"  value="<?=$filmas['metai']; ?>">
        </div>
        <div class="form-group">
            <label for="rezisierius">Rezisierius</label>
            <input type="text" class="form-control" id="rezisierius" name="rezisierius" value="<?=$filmas['rezisierius']; ?>">
        </div>
        <div class="form-group">
            <label for="ivertinimai">Ivertinimas</label>
            <input type="text" class="form-control" id="imdb" name="imdb" value="<?=$filmas['imdb']; ?>">
        </div>

        <div class="form-group">
            <label for="zanras">Filmo zanras</label>
            <input type="text" class="form-control" id="zanras" name="zanras"  value="<?=$filmas['zanroPavadinimas']; ?>">
        </div>
        <div class="form-group">
            <a href="?page=filmu-valdymas" class="btn btn-success">Atsaukti</a>
            <button type="submit" name="submit" class="btn btn-danger">Istrinti</button>
        </div>
    </form>
</div>

