<?php
$query=DB::query("Select description, horraire_lundi, horraire_mardi, horraire_mercredi, horraire_jeudi, horraire_vendredi from producer where id =".$_SESSION["id"]);
$tab=DB::fetch($query);
echo '<div class="content">
<h1>Profile</h1>
<form method="POST" action=page/modifyProfil.php>
<label for="des">Descritption:</label>
<br>';
if($tab["description"]!==""){
    echo '<textarea id="description" name="description" row="10" col="50" maxlength="500">'.$tab["description"].'</textarea>';
    $_SESSION["description"] = $tab["description"];
}
else{
    echo '<textarea id="description" name="description" row="10" col="50" maxlength="500"></textarea>';
};
echo'   <br>
<label for="horairelun">Horaires lundi:</label>
<br>';
if($tab["horraire_lundi"]!==""){
        echo '<textarea id="horairelun" name="horairelun" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none">'.$tab["horraire_lundi"].'</textarea>';
        $_SESSION["horraire_lundi"] = $tab["horraire_lundi"];
    }
else{
    echo '<textarea id="horairelun" name="horairelun" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none"></textarea>';
}
echo'<br>
<label for="horairemar">Horaires mardi:</label>
<br>';
if($tab["horraire_mardi"]!==""){
        echo '<textarea id="horairemar" name="horairemar" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none">'.$tab["horraire_mardi"].'</textarea>';
        $_SESSION["horraire_mardi"] = $tab["horraire_mardi"];
    }
else{
    echo '<textarea id="horairemar" name="horairemar" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none"></textarea>';
}
echo '<br>
<label for="horairemer">Horaires mercredi:</label>
<br>';
if($tab["horraire_mercredi"]!==""){
        echo '<textarea id="horairemer" name="horairemer" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none">'.$tab["horraire_mercredi"].'</textarea>';
        $_SESSION["horraire_mercredi"] = $tab["horraire_mercredi"];
    }
else {
    echo '<textarea id="horairemer" name="horairemer" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none"></textarea>';
};
echo '<br>
<label for="horairejeu">Horaires jeudi:</label>
<br>';
if($tab["horraire_jeudi"]!==""){
        echo '<textarea id="horairejeu" name="horairejeu" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none">'.$tab["horraire_jeudi"].'</textarea>';
        $_SESSION["horraire_jeudi"] = $tab["horraire_jeudi"];
    }
else {
    echo '<textarea id="horairejeu" name="horairejeu" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none"></textarea>';
};
echo '<br>
<label for="horaireven">Horaires vendredi:</label>
<br>';
if($tab["horraire_vendredi"]!==""){
        echo '<textarea id="horaireven" name="horaireven" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none">'.$tab["horraire_vendredi"].'</textarea>';
        $_SESSION["horraire_vendredi"] = $tab["horraire_vendredi"];
    }
else{
    echo '<textarea id="horaireven" name="horaireven" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none"></textarea>';
};
echo '<input type="submit" value="Modifier">
</form>
</div>';
?>
