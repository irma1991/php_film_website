<h2>Zanru valdymas</h2>
<?php session_start();
if($_SESSION):
?>
<?php
connectionDB();
$zanrai = genresManagement();
?>
<div class = "container">
    <a href = "?page=naujas-zanras"><button type="button" class="btn btn-secondary">Naujas zanras</button></a>
    <br><br>
    <table class = "table table-bordered genres-management-table">
        <thead class = "genres-management-table-head">
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
            <td class = "delete-film"><a style = "color: #495057" href="?page=zanru-salinimas&id=<?=$zanras['id'];?>">Salinti</a></td>
        </tr>
        <?php endforeach;?>
        </tr>
    </table>
</div>
<?php else:?>
    <?php header('Location:'.path.'?page=prisijungti'); ?>
<?php endif;?>