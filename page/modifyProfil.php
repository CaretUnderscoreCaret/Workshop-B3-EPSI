<?php
session_start();
include_once '../includes/classes/DB.php';
echo "Chargement\n";
$requete="";
if ($_POST['description']!==""){
    $test = 'update producer set description = "'.$_POST['description'].'" '.'where id = '.$_SESSION["id"];
    echo ($test);
    DB::query($test.";");
};
echo '1';
if ($_POST['horairelun']!==""){
    echo "\n";
    echo'update producer set horraire_lundi="'.$_POST['horairelun'].'"'.'where id='.$_SESSION["id"];
    DB::query('update producer set horraire_lundi="'.$_POST['horairelun'].'"'.'where id='.$_SESSION["id"]);
};
echo '1';
if ($_POST['horairemar']!==""){
    echo "\n";
    echo'update producer set horraire_mardi="'.$_POST['horairemar'].'"'.'where id='.$_SESSION["id"];
    DB::query('update producer set horraire_mardi="'.$_POST['horairemar'].'"'.'where id='.$_SESSION["id"]);
};
echo '1';
if ($_POST['horairemer']!==""){
    echo "\n";
    echo'update producer set horraire_mercredi="'.$_POST['horairemer'].'"'.'where id='.$_SESSION["id"];
    DB::query('update producer set horraire_mercredi="'.$_POST['horairemer'].'"'.'where id='.$_SESSION["id"]);
};
echo '1';
if ($_POST['horairejeu']!==""){
    echo "\n";
    echo'update producer set horraire_jeudi="'.$_POST['horairejeu'].'"'.'where id='.$_SESSION["id"];
    DB::query('update producer set horraire_jeudi="'.$_POST['horairejeu'].'"'.'where id='.$_SESSION["id"]);
};
echo '1';
if ($_POST['horaireven']!==""){
    echo "\n";
    echo'update producer set horraire_vendredi="'.$_POST['horaireven'].'"'.'where id='.$_SESSION["id"];
    DB::query('update producer set horraire_vendredi="'.$_POST['horaireven'].'"'.'where id='.$_SESSION["id"]);
};
echo '1';

header("Location :index.php?page=profil.php");