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