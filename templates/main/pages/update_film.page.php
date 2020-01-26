<h1>Filmo redagavimas</h1>
<?php

$dns= "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dns, $username, $password, $options);
    if($conn){
        $kuriUpdatinam = $_GET['id'];
        $stmt = $conn->query("SELECT lentele_filmai.id, lentele_filmai.pavadinimas, lentele_filmai.aprasymas, 
                              lentele_filmai.metai, lentele_filmai.rezisierius, lentele_filmai.imdb,
                              lentele_zanrai.id as zanro_id, lentele_zanrai.pavadinimas AS zanroPavadinimas
                              FROM lentele_filmai 
                              INNER JOIN lentele_zanrai ON lentele_filmai.genre_id=lentele_zanrai.id 
                              WHERE lentele_filmai.id = $kuriUpdatinam");
        $filmas = $stmt->fetch();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
} ?>

<?php if (isset($_POST['submit'])){
    try {
        if ($conn){
            $sql = "UPDATE lentele_filmai SET pavadinimas = :pavadinimas, 
                                          aprasymas = :aprasymas, 
                                          metai = :metai, 
                                          rezisierius =:rezisierius, 
                                          imdb = :imdb, 
                                          genre_id = :genre_id
                                          WHERE id = :id";
            $stmt= $conn->prepare($sql);
            $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
            $stmt->bindParam(':pavadinimas', $_POST['pavadinimas'], PDO::PARAM_STR);
            $stmt->bindParam(':aprasymas', $_POST['aprasymas'], PDO::PARAM_STR);
            $stmt->bindParam(':metai', $_POST['metai'], PDO::PARAM_STR);
            $stmt->bindParam(':rezisierius', $_POST['rezisierius'], PDO::PARAM_STR);
            $stmt->bindParam(':imdb', $_POST['imdb'], PDO::PARAM_STR);
            $stmt->bindParam(':genre_id', $_POST['zanroID'], PDO::PARAM_STR);
            $stmt->execute();
            header('Location:'.path.'?page=filmu-valdymas');


        }
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

?>

<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="id">Filmo id</label>
            <input type="text" class="form-control" id="id" name="id"  value="<?=$filmas['id']; ?>">
        </div>
        <div class="form-group">
            <label for="pavadinimas">Filmo pavadinimas</label>
            <input type="text" class="form-control" id="pavadinimas" name="pavadinimas"  value="<?=$filmas['pavadinimas']; ?>">
        </div>
        <div class="form-group">
            <label for="aprasymas">Aprasymas</label>
            <input type="text" class="form-control" id="aprasymas" name="aprasymas" value="<?=$filmas['aprasymas']; ?>">
        </div>
        <div class="form-group">
            <label for="metai">Filmo metai</label>
            <input type="text" class="form-control" id="metai" name="metai"  value="<?=$filmas['metai']; ?>">
        </div>
        <div class="form-group">
            <label for="rezisierius">Rezisierius</label>
            <input type="text" class="form-control" id="rezisierius" name="rezisierius" value="<?=$filmas['rezisierius']; ?>">
        </div>
        <div class="form-group">
            <label for="ivertinimai">Ivertinimai</label>
            <input type="text" class="form-control" id="imdb" name="imdb" value="<?=$filmas['imdb']; ?>">
        </div>
        <div class="form-group">
            <label for="zanras">Filmo zanras</label>
            <input type="text" class="form-control" id="zanras" name="zanras"  value="<?=$filmas['zanroPavadinimas']; ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="zanroID" name="zanroID"  value="<?=$filmas['zanro_id']; ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>