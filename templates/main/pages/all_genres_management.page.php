<h2>Zanru valdymas</h2>
<?php
connectionDB();
$zanrai = genresManagement();
?>
<div class = "container">
    <a href = "?page=naujas-zanras"><button type="button" class="btn btn-secondary">Naujas zanras</button></a>
    <br><br>
    <table class = "table table-bordered">
        <thead>
        <tr>
            <td>Zanro ID</td>
            <td>Pavadinimas</td>
            <td>Valdymas</td>
        </tr>
        </thead>
        <tr>
            <?php foreach ($zanrai as $zanras):?>
        <tr>
            <td><?=$zanras['id'];?></td>
            <td><?=$zanras['pavadinimas'];?></td>
            <td><a href="?page=zanru-salinimas&id=<?=$zanras['id'];?>">Salinti</a></td>
        </tr>
        <?php endforeach;?>
        </tr>
    </table>
</div>