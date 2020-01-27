<h2>Zanro istrynimas</h2>
<?php

$dns= "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dns, $username, $password, $options);
    if($conn){
        $kuriTrinam = $_GET['id'];
        $stmt = $conn->query("SELECT * FROM lentele_zanrai
                              WHERE id = $kuriTrinam");
        $zanras = $stmt->fetch();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
} ?>
<?php if (isset($_POST['submit'])){
    try {
        if ($conn){
            $sql = "DELETE FROM lentele_zanrai                
                    WHERE id = :id";
            $stmt= $conn->prepare($sql);
            $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
            $stmt->execute();
            header('Location:'.path.'?page=zanru-valdymas');
        }
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

?>

<div class="container">
    <form method="post">
        <div class="alert alert-danger" role="alert">Ar tikrai norite istrinti zanra?</div>
        <div class="form-group">
            <label for="id">Zanro ID</label>
            <input type="text" class="form-control" id="id" name="id"  value="<?=$zanras['id']; ?>">
        </div>
        <div class="form-group">
            <label for="pavadinimas">Zanro pavadinimas</label>
            <input type="text" class="form-control" id="pavadinimas" name="pavadinimas"  value="<?=$zanras['pavadinimas']; ?>">
        </div>
        <div class="form-group">
            <a href="?page=filmu-valdymas" class="btn btn-success">Atsaukti</a>
            <button type="submit" name="submit" class="btn btn-danger">Istrinti</button>
        </div>
    </form>
</div>

