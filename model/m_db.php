<?php

function db_connect() {
    static $db;
    if ($db === null) {
        $db = new PDO('mysql:host=localhost;dbname=booklib', 'root', 'root');
        $db->exec('SET NAMES UTF8');
    }
    return $db;
}

function db_query($sql, $params = []) {
    $db = db_connect();
    $query = $db->prepare($sql);
    $query->execute($params);

    db_checkerror($query);
    return $query;
}

function db_checkerror($query) {
    $info = $query->errorInfo();

    if ($info[0] != PDO::ERR_NONE) {
        exit($info[2]);
    }
}



//$db = new PDO('mysql:host=localhost;dbname=booklib', $dbuser, $dbpassword);
//$db->exec("SET NAMES UTF8");
//$query = $db->prepare("SELECT * FROM book LIMIT 3");
//$query->execute();
//$books = $query->fetchAll();
//
//$query = $db->prepare("SELECT * FROM book");
//$query->execute();
//$booksAll = $query->fetchAll();
//
//$query = $db->prepare("SELECT * FROM book WHERE id_book = 1");
//$query->execute();
//$booksSingle = $query->fetchAll();
//
//$query = $db->prepare("SELECT * FROM cross_book_author");
//$query->execute();
//$cross_book_author = $query->fetchAll();
//
//$query = $db->prepare("SELECT * FROM author");
//$query->execute();
//$authors = $query->fetchAll();



