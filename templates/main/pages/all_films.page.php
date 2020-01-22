<h2>Visi filmai</h2>
<?php
$dsn = "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password);
    if($conn){

        $stmt = $conn->query ("SELECT * FROM lentele_filmai");
        $filmai = $stmt->fetchAll();
    }
} catch (PDOException $e){
    echo $e->getMessage();
}?>

<table class = "table table-bordered">
    <tr>
        <?php foreach ($filmai as $filmas):?>
    <tr>
        <td><?=$filmas['id'];?></td>
        <td><?=$filmas['pavadinimas'];?></td>
        <td><?=$filmas['aprasymas'];?></td>
        <td><?=$filmas['metai'];?></td>
        <td><?=$filmas['rezisierius'];?></td>
        <td><?=$filmas['imdb'];?></td>
        <td><?=$filmas['genre_id'];?></td>
    </tr>
    <?php endforeach;?>
    </tr>
</table>