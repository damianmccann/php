<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visites</title>
</head>
<body>
    <?php
        $monfichier= fopen('compteur.txt','r+'); //On ouvre le fichier
        $nb_vues = fgets($monfichier); //On lit la premiere ligne et on l'enregistre dans une variable;
        $nb_vues++; //On augmente cette variable de 1;
        fseek($monfichier, 0); //On place le curseur au début du fichier
        fputs($monfichier, $nb_vues); //On écrit la nouvelle valeur dans le fichier
        fclose($monfichier); //On ferme le fichier
        echo "<p>Cette page a été vue $nb_vues fois ! <p>";
    ?>
</body>
</html>