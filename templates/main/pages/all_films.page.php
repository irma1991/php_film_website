<h2>Visi filmai</h2>
<?php
$dsn = "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password, $options);
    if($conn){

        $stmt = $conn->query ("SELECT lentele_filmai.pavadinimas, lentele_filmai.aprasymas, lentele_filmai.metai,
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