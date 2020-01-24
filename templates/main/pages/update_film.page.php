<?php
$dsn = "mysql:host=$host;dbname=$db";
$kuriRedaguojam = $_GET['id'];
try{
    $conn = new PDO($dsn, $username, $password, $options);
    if($conn){
        $stmt = $conn->query ("SELECT * FROM lentele_filmai
                                       WHERE id=$kuriRedaguojam");
        $filmas = $stmt->fetch();
    }
} catch (PDOException $e){
    echo $e->getMessage();
}?>

<?php if (isset($_POST['submit'])){
    try {
        if ($conn){
            $sql = "UPDATE lentele_filmai SET (pavadinimas, aprasymas, metai, rezisierius, imdb, genre_id),
                    VALUES (:pavadinimas, :aprasymas, :metai, :rezisierius, :imdb, :genre_id)";
            $stmt= $conn->prepare($sql);
            $stmt->bindParam(':pavadinimas', $_POST['pavadinimas'], PDO::PARAM_STR);
            $stmt->bindParam(':aprasymas', $_POST['aprasymas'], PDO::PARAM_STR);
            $stmt->bindParam(':metai', $_POST['metai'], PDO::PARAM_STR);
            $stmt->bindParam(':rezisierius', $_POST['rezisierius'], PDO::PARAM_STR);
            $stmt->bindParam(':imdb', $_POST['imdb'], PDO::PARAM_STR);
            $stmt->bindParam(':genre_id', $_POST['zanras'], PDO::PARAM_STR);
            $stmt->execute();
            header('Location:'.path.'?page=filmu-valdymas');
        }
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

?>

<div class = "container">
    <form method="post">
        <div class="form-group">
            <label>Filmo pavadinimas</label>
            <input class="form-control" id="pavadinimas" name="pavadinimas" value="<?=$filmas['pavadinimas'];?>">
        </div>
        <div class="form-group">
            <label>Aprasymas</label>
            <input class="form-control" id="aprasymas" name="aprasymas" value="<?=$filmas['aprasymas'];?>">
        </div>
        <div class="form-group">
            <label>Metai</label>
            <input class="form-control" id="metai" name="metai" value="<?=$filmas['metai'];?>">
        </div>
        <div class="form-group">
            <label>Rezisierius</label>
            <input class="form-control" id="rezisierius" name="rezisierius" value="<?=$filmas['rezisierius'];?>">
        </div>
        <div class="form-group">
            <label>IMDB</label>
            <input class="form-control" id="imdb" name="imdb" value="<?=$filmas['imdb'];?>">
        </div>
        <div class="form-group">
            <label>Zanras</label>
            <input class="form-control" id="zanras" name="zanras" value="<?=$filmas['genre_id'];?>">
        </div>
        <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
    </form>
</div>