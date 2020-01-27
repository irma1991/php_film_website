<h2>Visi filmu zanrai</h2>
<?php
connectionDB();
$zanrai = allGenres();
?>

        <?php foreach ($zanrai as $zanras):?>
            <ul class = "list-group">
                <li class = "list-group-item">
                    <a href="?page=zanrai&id=<?=$zanras['id'];?>"><?=$zanras['pavadinimas'];?></a>
                </li>
            </ul>
            <?php endforeach;?>
<?php if(isset($_GET['id'])):?>
    <?php $zandroId = $_GET['id'];
    $pagalZanrus = filmByGenre($zandroId);?>
    <table class = "table table-bordered">
        <thead>
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
<?php endif;?>
