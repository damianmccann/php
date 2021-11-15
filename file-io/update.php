<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Update</title>
    </head>
    <body>
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
                        $file = fopen('user.txt', 'r+');
                        $exists = false;
                        while(!$exists && $line = fgets($file)){
                            if($_POST['email'] ===  trim($line)){
                                $exists=true;
                                $pos = ftell($file);
                            }
                        }
                        if(!$exists){
                            echo "User does not exist !!!";
                        } else {
                            if(password_verify($password, trim(fgets($file), "\n"))){
                                fseek($file,$pos);
                                fputs($file, password_hash($newPassword, PASSWORD_DEFAULT)."\n");
                                echo "Your Password has been updated :)";
                            } else {
                                echo "Incorrect Password for this email address !!!";
                            }
                        }
                        fclose($file);
                    } else {
                        echo "Your new Password and your confirmed password DO NOT match !!!";
                    } 
                }
            }
        ?>
    </body>
</html>
