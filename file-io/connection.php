<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connection</title>
</head>
<body>
    <form action="connection.php" method="post">
        <div>
            <label for="email">Email :</label>
            <input id="email" type="email" name="email" required/>
        </div>
        <div>
            <label for="password">Password : </label>
            <input id="password" type="password" name="password" required/>
        </div>
        <input type="submit" value="Connect" />
    </form>
    <?php
        if(isset($_POST['email']) and isset($_POST['password'])){
            $file = fopen('user.txt','r');
            $find = false;
            while($ligne = fgets($file) and !$find){
                if($_POST['email'] ===  trim($ligne)){
                    $find=true;
                }
            }
            if($find){
                $hash= trim($ligne,"\n");
                if(password_verify($_POST['password'],$hash)){
                    echo "Connected :)";
                }
                else{
                    echo "Email or Password incorrect !!!";
                }
            }else{
                echo "Email or Password incorrect !!!";
            }
            fclose($file);
        }
    ?>
    