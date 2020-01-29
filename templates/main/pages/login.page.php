<?php

connectionDB();
session_start();

if (isset($_POST['login'])){
    $vardas= $_POST['vardas'];
    $trans = getUserByName($vardas);

    if($_POST['vardas'] == $trans['username'] && $_POST['slaptazodis']== $trans['password']){
        $_SESSION['vardas'] = "admin";
        header('Location:'.path.'?page=filmu-valdymas');
    }
    else{
        echo "Neteisingi prisijungimo duomenys";    }
}
?>
<h2>Prisijungimo puslapis</h2>
<div class = "container">
<form method="post">
    <div class="form-group">
        <label for="vardas">Vartotojo vardas</label>
        <input type="text" class="form-control" id="vardas" name="vardas" aria-describedby="vardas">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Vartotojo slaptazodis</label>
        <input type="password" class="form-control" name="slaptazodis" id="exampleInputPassword1">
    </div>
    <button type="submit" name="login" class="btn btn-secondary">Patvirtinti</button>
</form>
</div>