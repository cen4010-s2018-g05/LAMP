<!DOCTYPE html>
<html lang="en">

    <head>
    <title>Links</title>
    </head>
<body>
<?php
                
        try{
            
            $myfile = null;
            
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //searching for matching username
            $stmt = $conn->prepare("SELECT * FROM Link");
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result= $stmt->fetchall();
            if (count($result) > 0) {
                    echo "<table><tr><th>Product</th><th>Category</th><th>Link</th></tr>";
                    for($i=0;$i<count($result);$i++) {
                        $row = $result[$i];
                        //Product name button
                        echo "<tr><td>".$row["Product"]."</td><td>".$row["Category"]."</td>";
                        //message details
                        echo "<td><a href='".$row["Link"]."/index.html'>".$row["Product"]."' product</a>  </td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "You have no items";
                } 
            $result = null;
            $conn = null;
            }
                    catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }   
        catch(Exception $e){
            echo $e->getMessage();
        }
        ?>
    </body>