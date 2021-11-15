<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Exercice PHP EDF</title>
</head>
<body>
    <?php
    $equipe = array(
        "Gardiens"=> array('Hugo Lloris','Steve Mandanda',' Mike Maignan'),
        "Defenseurs"=> array('Benjamin Pavard','Léo Dubois','Raphael Varane', 'Kurt Zouma', 'Presnel Kimpembe', 'Clément Lenglet', 'Lucas Hernandez', 'Lucas Digne','Jules Koundé'),
        "Milieux" => array("N'Golo Kanté", 'Paul Pogba','Adrien Rabiot', 'Corentin Tolisso', 'Moussa Sissoko', 'Thomas Lemar'),
        "Attaquants" => array('Marcus Thuram', 'Kingsley Coman', 'Kylian Mbappé', 'Antoine Griezmann','Wissam Ben Yedder', 'Ousmane Dembélé') 
    );
    ?>

    <ul>
        <?php
            foreach ($equipe as $type => $positions) {
                if (is_array($positions)){
                    echo "<li>$type";
                    echo "<ul>";
                    foreach ($positions as $jouer) {
                        echo "<li>$jouer</li>";
                    }
                    echo "</ul>";
                    echo "</li>";
                }
            }        
         ?>
    </ul>
    
</body>
</html>

