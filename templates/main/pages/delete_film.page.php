<h2>Filmo istrynimas</h2>
<?php
$dsn = "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password, $options);
    if($conn){
        if(isset($GET_['submit'])){
            $kuriTrinam = $_GET['id'];
            $stmt = $conn->query ("DELETE FROM lentele_filmai
                                            WHERE id =$kuriTrinam");
        }
    }
} catch (PDOException $e){
    echo $e->getMessage();
}

?>
<form method="get">
    <div class="container alert alert-danger" role="alert">
        Ar tikrai norite istrinti filma?
    </div>
<div class="container">
    <button type="submit" name = "submit" class="btn btn-secondary">Patvirtinti</button>
</div>
</form>

