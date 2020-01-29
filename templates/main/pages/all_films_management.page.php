<h2>Filmu valdymas</h2>
<?php session_start();
if($_SESSION):
?>
<?php
connectionDB();
$filmai = filmsManagement();
?>

<div class = "container">
    <a href = "?page=naujas-filmas"><button type="button" class="btn btn-secondary">Prideti nauja filma</button></a>
    <br><br>
<table class = "table table-bordered films-management-table">
    <thead class = "films-management-table-head">
    <tr>
        <td>Pavadinimas</td>
        <td>Aprasymas</td>
        <td>Metai</td>
        <td>Rezisierius</td>
        <td>IMDB</td>
        <td>Kategorija</td>
        <td>Valdymas</td>
        <td>Valdymas</td>
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
        <td class = "update-film"><a style = "color: #495057;" href="?page=filmu-redagavimas&id=<?=$filmas['id'];?>">Redaguoti</a></td>
        <td class = "delete-film"><a style = "color: #495057;" href="?page=filmu-salinimas&id=<?=$filmas['id'];?>">Salinti</a></td>
    </tr>
    <?php endforeach;?>
    </tr>
</table>
</div>
<?php else:?>
    <?php header('Location:'.path.'?page=prisijungti'); ?>
<?php endif;?>