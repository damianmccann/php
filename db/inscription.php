<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Inscription</title>
    </head>
    <body>
        <?php
            require("db.php"); // Connects to database. Connection is available with $db
        ?>
        <h1>Please enter Email and Password</h1>
        <form action="inscription.php" method="post">
            <div>
                <label for="email">Email :</label>
                <input id="email" type="email" name="email" />
            </div>
            <div>
                <label for="password">Password :</label>
                <input id="password" type="password" name="password" />
            </div>
            <div>
                <label for="password2">Confirm Password :</label>
                <input id="password2" type="password" name="password2" />
            </div>
            <input type="submit" value="Sign up" />
        </form>
        <?php 
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            if(isset($email) and isset($password) and isset($password2)){
                if($password == $password2) {
                    if(doesEmailExist($db, $email)){
                        echo "User already exists !!!";
                    } else {
                        $passHash = password_hash($password, PASSWORD_DEFAULT);
                        createUser($db, $email, $passHash);
                    }
                } else {
                    echo "Passwords do not match !!!";
                }
            }
        ?>
    </body>
</html>
