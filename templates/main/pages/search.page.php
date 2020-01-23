<h2>Filmu paieska</h2>
<?php
$dsn = "mysql:host=$host;dbname=$db";
$rezultatai = [];
try{
    $conn = new PDO($dsn, $username, $password, $options);
    if($conn){

        $stmt = $conn->query ("SELECT pavadinimas FROM lentele_filmai");
        if(isset($_POST['search'])){
            $uzklausa = $conn->prepare ("SELECT lentele_zanrai.pavadinimas as kategorija,
                                    lentele_filmai.pavadinimas, lentele_filmai.rezisierius,
                                    lentele_filmai.metai, lentele_filmai.imdb,
                                    lentele_filmai.aprasymas FROM lentele_filmai
                                    INNER JOIN lentele_zanrai
                                    ON lentele_filmai.genre_id = lentele_zanrai.id
                                    WHERE lentele_filmai.pavadinimas LIKE ?");
            $input = $_POST['pavadinimas'];
            var_dump($input);
            $uzklausa->bindValue(1, "%$input%", PDO::PARAM_STR);
            $uzklausa->execute();
            $rezultatai = $uzklausa->fetchAll();
        }
    }
} catch (PDOException $e){
    echo $e->getMessage();
}
?>

<div class = "container">
<form method = "post">
    <div class="form-group">
        <label for="pavadinimas">Iveskite filmo pavadinima</label>
        <input class = "form-control" id="pavadinimas" name="pavadinimas">
    </div>
    <button type="submit" class="btn btn-primary" name="search">Submit</button>
</form>
</div>

    <table class = "table table-bordered">
        <thead>
        <tr>
            <td>Pavadinimas</td>
            <td>Aprasymas</td>
            <td>Metai</td>
            <td>Rezisierius</td>
            <td>IMDB</td>
        </tr>
        </thead>
        <tr>
            <?php foreach ($rezultatai as $rezultatas):?>
        <tr>
            <td><?=$rezultatas['pavadinimas'];?></td>
            <td><?=$rezultatas['aprasymas'];?></td>
            <td><?=$rezultatas['metai'];?></td>
            <td><?=$rezultatas['rezisierius'];?></td>
            <td><?=$rezultatas['imdb'];?></td>
        </tr>
        <?php endforeach;?>
        </tr>
    </table>
