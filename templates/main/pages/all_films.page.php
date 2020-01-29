<?php
connectionDB();
$filmai = allFilms();
?>

<h2>Visi filmai</h2>

<div class = "container">
<table class = "table table-bordered all-films-table">
    <thead class = "all-films-table-head">
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
        <?php foreach ($filmai as $filmas):?>
    <tr>
        <td><?=$filmas['pavadinimas'];?></td>
        <td><?=$filmas['aprasymas'];?></td>
        <td><?=$filmas['metai'];?></td>
        <td><?=$filmas['rezisierius'];?></td>
        <td><?=$filmas['imdb'];?></td>
        <td><?=$filmas['zanroPavadinimas'];?></td>
    </tr>
    <?php endforeach;?>
    </tr>
</table>
</div>