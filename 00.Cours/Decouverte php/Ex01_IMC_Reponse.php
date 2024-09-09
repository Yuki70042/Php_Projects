<?php

// On importe les variables envoyees par le client en variables php
$imc_taille = $_POST["imc_taille"];
$imc_poids = $_POST["imc_poids"];

$imc = $imc_poids / ($imc_taille * $imc_taille);

if ($imc < 16.5)
    $message = "en maigreur extreme";
else if($imc <= 18.5)
    $message = "en maigreur";
else if($imc <= 25)
    $message = "Normal";
else if($imc <= 30)
    $message = "plus que normal !";
else
    $message = "peut être trop ou pas !";


echo "Pour un poids de $imc_poids et une taille de $imc_taille votre imc est de $imc";
echo "Vous etes ",$message;
