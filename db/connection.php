<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connection</title>
</head>
<body>
    <?php
        require("db.php"); // Connects to database. Connection is available with $db
    ?>
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
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(isset($email) and isset($password)){
                if(doesEmailExist($db, $email)){
                    $dbPassHash = getPassHashForEmail($db, $email);
                    if(password_verify($password,$dbPassHash)){
                        echo "Connected :)";
                    }
                    else{
                        echo "Password incorrect for this Email!!!";
                    }
                } else {
                    echo "Email does NOT exist !!!";
                }
            }
        }
    ?>
    