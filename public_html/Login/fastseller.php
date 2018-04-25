<!DOCTYPE html>
<html>
    <body>
<?php
        //used to make staff account -> hashes password
        try{
        $email = "Admin@fau.edu";
        $pass = "Adminpass";
        
        //entering mysql
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        
        $sql = $conn->prepare("INSERT INTO Users (Email, Znumber, Password) Values (:Email, :Znumber, :Password)
             ");
            $znum = 00000000;
            $passhash = password_hash($pass, PASSWORD_DEFAULT);
            $sql->bindParam(':Email', $email);
            $sql->bindParam(':Znumber', $znum);
            $sql->bindParam(':Password', $passhash);
               
        // use exec() because no results are returned
            $sql->execute();
        $sql = $conn->prepare("INSERT INTO Type (Znumber, Type) Values (:Znumber, :Type)
             ");
        $sql->bindParam(':Znumber', $znum);
        $type = "admin";
        $sql->bindParam(':Type', $type);
               
        // use exec() because no results are returned
            $sql->execute();
        echo "Account created";
            $conn = null;
  }
        
         catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }   
        catch (SException $e){
            echo 'Message: ' .$e->getMessage();
        }
        ?>
        
    </body>