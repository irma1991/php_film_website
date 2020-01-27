<?php
$dsn = "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password, $options);
    if($conn){
        if (isset($_POST['submit'])){

            $sql = "INSERT INTO lentele_zanrai (pavadinimas)
                    VALUES (:pavadinimas)";
            $stmt= $conn->prepare($sql);
            $stmt->bindParam(':pavadinimas', $_POST['pavadinimas'], PDO::PARAM_STR);
            $stmt->execute();
            header('Location:'.path.'?page=zanru-valdymas');
        }
    }
} catch (PDOException $e){
    echo $e->getMessage();
}?>

<?php
$validation_errors=[];
if (isset($_POST['submit'])){
    if (!preg_match('/[\w\s{50,1000}]/i',
        trim(htmlspecialchars($_POST['pavadinimas'])))) {
        $validation_errors[] = "netinkamas formatas";
    } else {
        $_POST['pavadinimas'] = trim(htmlspecialchars($_POST['pavadinimas']));
    }
}
?>

<?php
if($validation_errors) :?>
    <div class="errors">
        <ul>
            <?php foreach($validation_errors as $error) :?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

<div class = "container">
    <form method="post">
        <div class="form-group">
            <label>Zanro pavadinimas</label>
            <input class="form-control" id="pavadinimas" name="pavadinimas">
        </div>
        <button type="submit" class="btn btn-primary" id="submit" name="submit">Patvirtinti</button>
    </form>
</div>