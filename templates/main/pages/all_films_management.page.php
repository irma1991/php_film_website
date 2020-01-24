<h2>Filmu valdymas</h2>
<?php
$dsn = "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password, $options);
    if($conn){

        $stmt = $conn->query ("SELECT lentele_filmai.id, lentele_filmai.pavadinimas, lentele_filmai.aprasymas, lentele_filmai.metai,
                                        lentele_filmai.rezisierius, lentele_filmai.imdb, lentele_zanrai.pavadinimas
                                        AS zanroPavadinimas
                                        FROM lentele_filmai
                                        INNER JOIN lentele_zanrai ON lentele_filmai.genre_id=lentele_zanrai.id");
        $filmai = $stmt->fetchAll();
    }
} catch (PDOException $e){
    echo $e->getMessage();
}
?>
<div class = "container">
    <a href = "?page=naujas-filmas"><button type="button" class="btn btn-secondary">Naujas filmas</button></a>
    <br><br>
<table class = "table table-bordered">
    <thead>
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
        <td><a href="?page=filmu-redagavimas&id=<?=$filmas['id'];?>">Redaguoti</a></td>
        <td><a href="?page=filmu-salinimas&id=<?=$filmas['id'];?>">Salinti</a></td>
    </tr>
    <?php endforeach;?>
    </tr>
</table>
</div>