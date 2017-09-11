<?php
/**
 * Created by PhpStorm.
 * User: Niquelesstup
 * Date: 28/08/2017
 * Time: 23:53
 */

require "database.php";

session_start();

$db = getConnexion();

function estConnecte() {
    if (!empty($_SESSION))
        return true;
    else
        return false;
}

function activeMenuIfContain($chaine){
    $url = $_SERVER["REQUEST_URI"];
    if (stripos($url, $chaine))
        echo 'class="active"';
    else
        echo "";
}

function messageForm($message, $success = false){
    if ($success) {
        $class = "alert-success";
        $intro = "Bien joué";
    }else {
        $class = "alert-danger";
        $intro = "Erreur";
    }
    echo '<div class="alert alert-dismissible '.$class.'">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>'.$intro.'! </strong> '.$message.'
    </div>';
}

function getReservationsTriees($listeReservations, $tri){
    $liste_resa_mois = [];
    foreach ($listeReservations as $uneResa){
        $date_debut_resa = new \DateTime($uneResa->getPlageHoraire()->getHeureDebut());
        $mois_resa = $date_debut_resa->format($tri);
        $ajd = new \DateTime();
        if ($mois_resa == $ajd->format($tri))
            $liste_resa_mois[] = $uneResa;
    }
    return $liste_resa_mois;
}

?>