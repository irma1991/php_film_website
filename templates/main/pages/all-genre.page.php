<h2>Visi filmu zanrai</h2>
<?php
connectionDB();
$zanrai = allGenres();
?>

        <?php foreach ($zanrai as $zanras):?>
        <div class = "container">
            <ul class = "list-group">
                <li class = "list-group-item">
                    <a style = "color: #495057;" href="?page=zanrai&id=<?=$zanras['id'];?>"><?=$zanras['pavadinimas'];?></a>
                </li>
            </ul>
        </div>
            <?php endforeach;?>
<?php if(isset($_GET['id'])):?>
    <?php $zandroId = $_GET['id'];
    $pagalZanrus = filmByGenre($zandroId);?>
<div class = "container show-by-genre">
    <table class = "table table-bordered show-by-genre-table">
        <thead class = "show-by-genre-table-head">
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
            <?php foreach ($pagalZanrus as $pagalZanra):?>
        <tr>
            <td><?=$pagalZanra['zanroPavadinimas'];?></td>
            <td><?=$pagalZanra['pavadinimas'];?></td>
            <td><?=$pagalZanra['aprasymas'];?></td>
            <td><?=$pagalZanra['metai'];?></td>
            <td><?=$pagalZanra['rezisierius'];?></td>
            <td><?=$pagalZanra['imdb'];?></td>
        </tr>
        <?php endforeach;?>
        </tr>
    </table>
</div>
<?php endif;?>
