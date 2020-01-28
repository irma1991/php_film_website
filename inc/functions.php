<?php

function connectionDB(){
    global $host, $db, $username, $password, $options;
    $dsn = "mysql:host=$host;dbname=$db";
    try{
        $conn = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e){
        echo $e->getMessage();
        exit;
    } return $conn;
}

function allFilms(){
    $conn = connectionDB();
    try{
        if ($conn){
            $stmt = $conn->query("SELECT lentele_filmai.pavadinimas, lentele_filmai.aprasymas, lentele_filmai.metai,
                                        lentele_filmai.rezisierius, lentele_filmai.imdb, lentele_zanrai.pavadinimas
                                        AS zanroPavadinimas
                                        FROM lentele_filmai
                                        INNER JOIN lentele_zanrai ON lentele_filmai.genre_id=lentele_zanrai.id");

            $filmai = $stmt->fetchAll();
        }
    } catch (PDOException $e){
        echo $e->getMessage();
        exit;
    } return $filmai;
}

function allGenres(){
    $conn = connectionDB();
    try{
        if($conn) {

            $stmt = $conn->query("SELECT * FROM lentele_zanrai");
            $zanrai = $stmt->fetchAll();
        }
    } catch (PDOException $e){
        echo $e->getMessage();
    } return $zanrai;
}

function filmByGenre($zandroId){
    $conn = connectionDB();

    try {
        if (isset($zandroId)){
            $stmt = $conn->query("SELECT lentele_filmai.pavadinimas, lentele_filmai.aprasymas, lentele_filmai.metai,
                                        lentele_filmai.rezisierius, lentele_filmai.imdb, lentele_zanrai.pavadinimas
                                        AS zanroPavadinimas
                                        FROM lentele_filmai
                                        INNER JOIN lentele_zanrai ON lentele_filmai.genre_id=lentele_zanrai.id
                                        WHERE $zandroId=lentele_zanrai.id");
            $pagalZanrus = $stmt->fetchAll();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    } return $pagalZanrus;
}

function searchPavadinimas(){
    $conn = connectionDB();
    try {
        if ($conn) {

            $stmt = $conn->query("SELECT pavadinimas FROM lentele_filmai");
            $filmai = $stmt->fetchAll();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    } return $filmai;
}

function searchFilmas($input){
    $conn = connectionDB();
    try{
        if($conn){
            $uzklausa = $conn->prepare ("SELECT lentele_zanrai.pavadinimas as kategorija,
                                    lentele_filmai.pavadinimas, lentele_filmai.rezisierius,
                                    lentele_filmai.metai, lentele_filmai.imdb,
                                    lentele_filmai.aprasymas FROM lentele_filmai
                                    INNER JOIN lentele_zanrai
                                    ON lentele_filmai.genre_id = lentele_zanrai.id
                                    WHERE lentele_filmai.pavadinimas LIKE ?");
            $uzklausa->bindValue(1, "%$input%", PDO::PARAM_STR);
            $uzklausa->execute();
            $rezultatai = $uzklausa->fetchAll();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    } return $rezultatai;
}

function filmsManagement(){
    $conn = connectionDB();
    try{
        if($conn) {

            $stmt = $conn->query ("SELECT lentele_filmai.id, lentele_filmai.pavadinimas, lentele_filmai.aprasymas, lentele_filmai.metai,
                                        lentele_filmai.rezisierius, lentele_filmai.imdb, lentele_zanrai.pavadinimas
                                        AS zanroPavadinimas
                                        FROM lentele_filmai
                                        INNER JOIN lentele_zanrai ON lentele_filmai.genre_id=lentele_zanrai.id");
            $filmai = $stmt->fetchAll();
        }
    } catch (PDOException $e){
        echo $e->getMessage();
    } return $filmai;
}

function genresManagement(){
    $conn = connectionDB();
    try{
        if($conn) {

            $stmt = $conn->query ("SELECT * FROM lentele_zanrai");
            $zanrai = $stmt->fetchAll();
        }
    } catch (PDOException $e){
        echo $e->getMessage();
    } return $zanrai;
}

function updateFilm(){
    $conn = connectionDB();
    try {
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
    } return $filmas;
}

function updateFilm2(){
    $conn = connectionDB();
    try {
        if($conn) {
            if (isset($_POST['submit'])) {
                $sql = "UPDATE lentele_filmai SET pavadinimas = :pavadinimas, 
                                          aprasymas = :aprasymas, 
                                          metai = :metai, 
                                          rezisierius =:rezisierius, 
                                          imdb = :imdb, 
                                          genre_id = :genre_id
                                          WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
                $stmt->bindParam(':pavadinimas', $_POST['pavadinimas'], PDO::PARAM_STR);
                $stmt->bindParam(':aprasymas', $_POST['aprasymas'], PDO::PARAM_STR);
                $stmt->bindParam(':metai', $_POST['metai'], PDO::PARAM_STR);
                $stmt->bindParam(':rezisierius', $_POST['rezisierius'], PDO::PARAM_STR);
                $stmt->bindParam(':imdb', $_POST['imdb'], PDO::PARAM_STR);
                $stmt->bindParam(':genre_id', $_POST['zanroID'], PDO::PARAM_STR);
                $stmt->execute();
                header('Location:' . path . '?page=filmu-valdymas');
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function deleteFilm(){
    $conn = connectionDB();
    try {
        if($conn){
            $kuriTrinam = $_GET['id'];
            $stmt = $conn->query("SELECT lentele_filmai.id, lentele_filmai.pavadinimas, lentele_filmai.aprasymas, 
                              lentele_filmai.metai, lentele_filmai.rezisierius, lentele_filmai.imdb, lentele_zanrai.pavadinimas AS zanroPavadinimas
                              FROM lentele_filmai 
                              INNER JOIN lentele_zanrai ON lentele_filmai.genre_id=lentele_zanrai.id
                              WHERE lentele_filmai.id = $kuriTrinam");
            $filmas = $stmt->fetch();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    } return $filmas;
}

function deleteFilm2(){
    $conn = connectionDB();
    try {
        if($conn) {
            if (isset($_POST['submit'])) {
                $sql = "DELETE FROM lentele_filmai                
                    WHERE id = :id";
                $stmt= $conn->prepare($sql);
                $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
                $stmt->execute();
                header('Location:'.path.'?page=filmu-valdymas');
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function addFilm(){
    $conn = connectionDB();
    try {
        if($conn){
            $stmt = $conn->query ("SELECT * FROM lentele_zanrai");
            $zanrai = $stmt->fetchAll();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    } return $zanrai;
}

function addFilm2(){
    $conn = connectionDB();
    try {
        if($conn) {
            if (isset($_POST['submit'])) {
                $sql = "INSERT INTO lentele_filmai (pavadinimas, aprasymas, metai, rezisierius, imdb, genre_id)
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
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function addGenre(){
    $conn = connectionDB();
    try {
        if($conn) {
            if (isset($_POST['submit'])) {
                $sql = "INSERT INTO lentele_zanrai (pavadinimas)
                    VALUES (:pavadinimas)";
                $stmt= $conn->prepare($sql);
                $stmt->bindParam(':pavadinimas', $_POST['pavadinimas'], PDO::PARAM_STR);
                $stmt->execute();
                header('Location:'.path.'?page=zanru-valdymas');
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


function deleteGenre(){
    $conn = connectionDB();
    try {
        if($conn){
            $kuriTrinam = $_GET['id'];
            $stmt = $conn->query("SELECT * FROM lentele_zanrai
                              WHERE id = $kuriTrinam");
            $zanras = $stmt->fetch();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    } return $zanras;
}

function deleteGenre2(){
    $conn = connectionDB();
    try {
        if($conn) {
            if (isset($_POST['submit'])) {
                $sql = "DELETE FROM lentele_zanrai                
                    WHERE id = :id";
                $stmt= $conn->prepare($sql);
                $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
                $stmt->execute();
                header('Location:'.path.'?page=zanru-valdymas');
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}



