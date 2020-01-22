<?php
$dsn = "mysql:host=$host;dbname=$db";
try{
    $conn = new PDO($dsn, $username, $password);
    if($conn){

        $stmt = $conn->query ("SELECT * FROM lentele_zanrai");
        $zanrai = $stmt->fetchAll();
    }
} catch (PDOException $e){
    echo $e->getMessage();
}?>

<div class = "container">
<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Filmo pavadinimas</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Aprasymas</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Metai</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Rezisierius</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">IMDB</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
        <div class="form-group">
            <label for="inputState">Zanras</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <?php foreach ($zanrai as $zanras):?>
                <option><?= $zanras['pavadinimas'];?></option>
                <?php endforeach;?>
            </select>
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>