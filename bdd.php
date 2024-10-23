<?php

function connexion() : PDO {
    return new PDO('mysql:host=localhost:8889;dbname=artbox;charset=utf8', 'root', 'root');
}

function getOeuvres() : array
{
    $mysqlClient = connexion();

    $sqlQuery = 'SELECT * FROM oeuvres';
    $recipesStatement = $mysqlClient->prepare($sqlQuery);
    $recipesStatement->execute();
    $oeuvres = $recipesStatement->fetchAll();

    return $oeuvres;
}
