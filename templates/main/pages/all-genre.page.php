<h2>Visi filmu zanrai</h2>
<?php
$dsn = "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password, $options);
    if($conn){

        $stmt = $conn->query ("SELECT * FROM lentele_zanrai");
        $zanrai = $stmt->fetchAll();

        if(isset($_GET['id'])){
            $zandroId = $_GET['id'];
            $stmt = $conn->query ("SELECT lentele_filmai.pavadinimas, lentele_filmai.aprasymas, lentele_filmai.metai,
                                        lentele_filmai.rezisierius, lentele_filmai.imdb, lentele_zanrai.pavadinimas
                                        AS zanroPavadinimas
                                        FROM lentele_filmai
                                        INNER JOIN lentele_zanrai ON lentele_filmai.genre_id=lentele_zanrai.id
                                        WHERE $zandroId=lentele_zanrai.id");
            $pagalZanrus = $stmt->fetchAll();
        }
    }
} catch (PDOException $e){
    echo $e->getMessage();
}
?>

        <?php foreach ($zanrai as $zanras):?>
            <ul class = "list-group">
                <li class = "list-group-item">
                    <a href="?page=zanrai&id=<?=$zanras['id'];?>"><?=$zanras['pavadinimas'];?></a>
                </li>
            </ul>
            <?php endforeach;?>
<?php if(isset($_GET['id'])):?>
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
