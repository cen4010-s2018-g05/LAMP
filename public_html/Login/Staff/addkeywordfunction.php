<?php

         
        try {
            
            //form var
            $Product = $_REQUEST[htmlspecialchars("Product")];
            if (empty($Product)){
                throw new Exception("Product name was not sent");
            }
            $Keyword = $_REQUEST[htmlspecialchars("Keyword")];
            if (empty($Keyword)){
                throw new Exception("Please enter a keyword");
            }
            //put wildcards in keyword
            $Wildkeyword = "%" . $Keyword . "%"; 
            //creates initial connection
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //searches for product and keyword pair
            $stmt = $conn->prepare("SELECT * FROM Keyword WHERE 
            Product=:product AND Keyword like :keyword");
            $stmt->bindParam(':product', $Product);
            $stmt->bindParam(':keyword', $Wildkeyword);
            
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result= $stmt->fetchall();
            
            //var_dump($result);
            if (count($result) > 0) {
                //keyword and product matched
                throw new Exception("The keyword already exsists for this prodcut.");
            } 
            //add product keyword pair
            $stmt = $conn->prepare("INSERT INTO Keyword (Product, Keyword) Values (:product, :keyword)");
            $stmt->bindParam(':product', $Product);
            //binds keyword without wildcards
            $stmt->bindParam(':keyword', $Keyword);
            
            echo $Keyword . " has been added to " .$Product ".\n";
            
            //obtain current keyword list for product and display on screen
            $stmt = $conn->prepare("SELECT Keyword FROM Keyword WHERE 
            Product=:product");
            $stmt->bindParam(':product', $Product);
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result= $stmt->fetchall();
            //result is array with each element being a keyword
            $keylist = "";
            for ($x = 0; x < count($result); x++){
                if ($x == 0){
                    $keylist = $keylist + $result[$x]["Keyword"];
                }
                else{
                  $keylist = $keylist . +", "  +. $result[$x]["Keyword"];
                }
                
            }
            echo "Current keywords are: ". +$keylist;
            
            $conn = null;
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }   
        catch(Exception $e){
            echo $e->getMessage();
        }
?>
