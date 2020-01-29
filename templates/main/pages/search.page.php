<h2>Filmu paieska</h2>
<?php
connectionDB();
$filmai = searchPavadinimas();
?>

<div class = "container">
<form method = "post">
    <div class="form-group">
        <label for="pavadinimas">Iveskite filmo pavadinima</label>
        <input class = "form-control" id="pavadinimas" name="pavadinimas" list="pavadinimai" autocomplete="off">
        <datalist id="pavadinimai">
            <?php foreach ($filmai as $filmas):?>
                <option value="<?=$filmas['pavadinimas'];?>">
            <?php endforeach; ?>
        </datalist>
    </div>
    <button type="submit" class="btn btn-secondary" name="search">Patvirtinti</button>
</form>
</div>
<?php if(isset($_POST['pavadinimas'])):?>
    <?php
    $input = $_POST['pavadinimas'];
    $rezultatai = searchFilmas($input);
    ?>
<div class = "container search-film">
    <table class = "table table-bordered search-film-table">
        <thead class = "search-film-table-head">
        <tr>
            <td>Pavadinimas</td>
            <td>Aprasymas</td>
            <td>Metai</td>
            <td>Rezisierius</td>
            <td>IMDB</td>
            <td>Kategorija</td>
        </tr>
        </thead>
        <tr>
            <?php foreach ($rezultatai as $rezultatas):?>
        <tr>
            <td><?=$rezultatas['pavadinimas'];?></td>
            <td><?=$rezultatas['aprasymas'];?></td>
            <td><?=$rezultatas['metai'];?></td>
            <td><?=$rezultatas['rezisierius'];?></td>
            <td><?=$rezultatas['imdb'];?></td>
            <td><?=$rezultatas['kategorija'];?></td>
        </tr>
        <?php endforeach;?>
        </tr>
    </table>
</div>
<?php endif;?>
