<?php


function afficherFormulaire($imc_taille="", $imc_poids="")
{
    echo '
   <html >
   
    <head >
       <title > IMC Demande </title >
    </head >

    <body >
    <h1 > Calcul IMC </h1 >
    <form method = "post" action = "Ex01_IMC_1Fichier.php" >
       Taille : <input type = "number" step = "any"  name = "imc_taille" value = "';
        if($imc_taille != ""){
            echo "" .$imc_taille;
        }
        else
            echo '1.85';
        echo '" > mètres <br >
    Poids : <input type = "number" name = "imc_poids" value = "';
        if($imc_poids != ""){
            echo "" .$imc_poids;
        }
        else
            echo '55';


        echo '" > kg <br >
       <input type = "submit" name = "imc_button" value = "Calculer !" >
    </form >
    </body >
    </html>';


}


if (isset($_POST['imc_button'])) {

    $imc_taille = $_POST["imc_taille"];
    $imc_poids = $_POST["imc_poids"];
    afficherFormulaire($imc_taille, $imc_poids);
    $imc = $imc_poids / ($imc_taille * $imc_taille);


    if ($imc < 16.5)
        $message = "maigreur extreme";
    else if ($imc <= 18.5)
        $message = "maigreur";
    else if ($imc <= 25)
        $message = "Normal";
    else if ($imc <= 30)
        $message = "plus que normal !";
    else
        $message = "peut être trop ou pas !";

    echo "Pour un poids de $imc_poids et une taille de $imc_taille votre imc est de $imc. $message";
} else
    afficherFormulaire();