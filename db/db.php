<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=db_exemple;charset=utf8;port=3306", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Connectio aborted: ".$e->getMessage();
    }

    function doesEmailExist($db, $email) {
        $sql = $db->prepare("select * from user where email=:email");
        $sql->bindParam(':email', $email);
        $sql->execute();
        if(!$sql->fetch()) {
            return false;
        } else {
            return true;
        }
    }

    function createUser($db, $email, $passHash) {
        $sql = $db->prepare("insert into user (email, password) values(:email, :passHash)");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':passHash', $passHash);
        if ($sql->execute()) {
            echo "User registered";
        } else {
            echo "Error: " . $sql;
        }
    }

    function getPassHashForEmail($db, $email) {
        $sql = $db->prepare("select password from user where email=:email");
        $sql->bindParam(':email', $email);
        $sql->execute();
        return $sql->fetch()[0];
    }

    function updatePassword($db, $email, $passHash) {
        $sql = $db->prepare("update user set password = :passHash where email=:email");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':passHash', $passHash);
        if ($sql->execute()) {
            echo "Password updated.";
        } else {
            echo "Error: " . $sql;
        }
    }

?>
