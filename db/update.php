<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Update</title>
    </head>
    <body>
        <?php
            require("db.php"); // Connects to database. Connection is available with $db
        ?>
        <h1>To Update please enter Email and current password followed by new password and confirmation password...</h1>
        <form action="update.php" method="post">
            <div>
                <label for="email">Email :</label>
                <input id="email" type="email" name="email" />
            </div>
            <div>
                <label for="password">Current Password :</label>
                <input id="password" type="password" name="password" />
            </div>
            <div>
                <label for="newPassword">New Password :</label>
                <input id="newPassword" type="password" name="newPassword" />
            </div>
            <div>
                <label for="newPassword2">Confirm new Password :</label>
                <input id="newPassword2" type="password" name="newPassword2" />
            </div>
            <input type="submit" value="Update" />
        </form>
        <?php 
            $email = $_POST['email'];
            $password = $_POST['password'];
            $newPassword = $_POST['newPassword'];
            $newPassword2 = $_POST['newPassword2'];
            if(isset($email) && isset($password) && isset($newPassword) && isset($newPassword2)){
                if($password == $newPassword) {
                    echo "Your new Password must be different from your old password !!!";
                } else {
                    if($newPassword == $newPassword2) {
                        if(doesEmailExist($db, $email)){
                            $dbPassHash = getPassHashForEmail($db, $email);
                            if(password_verify($password,$dbPassHash)){
                                updatePassword($db, $email, password_hash($newPassword, PASSWORD_DEFAULT));
                            }
                            else{
                                echo "Password incorrect for this Email!!!";
                            }
                        } else {
                            echo "User does NOT exist !!!";
                        }

                    } else {
                        echo "Your new Password and your confirmed password DO NOT match !!!";
                    } 
                }
            }
        ?>
    </body>
</html>
