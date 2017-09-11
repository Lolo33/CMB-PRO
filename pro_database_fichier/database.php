<?php
/**
 * Created by PhpStorm.
 * User: Niquelesstup
 * Date: 30/08/2017
 * Time: 03:39
 */

function getConnexion()
{
    $host_name  = "db695868253.db.1and1.com";
    $database   = "db695868253";
    $user_name  = "dbo695868253";
    $password   = "Matemaker33!";

    try {
        $db = new PDO('mysql:host=' . $host_name . ';dbname=' . $database . ';charset=utf8', '' . $user_name . '', $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        return $db;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}