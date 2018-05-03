        <?php
                
            $verified = false;
            
            if (!empty($_SESSION["email"])){
                $email = htmlspecialchars($_SESSION["email"]); 
                $tempID = htmlspecialchars($_SESSION["id"]); 
                $Znumber = htmlspecialchars($_SESSION["znum"]); 
            }
            else {
                echo "Session not detected";
                include "loginecho.php";
                throw new Exception("Due to inactivity, please login again");
            }
            //entering mysql
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //searching for last visit
            $stmt = $conn->prepare("SELECT * FROM Visit WHERE 
            Znumber=:Znumber");
            $stmt->bindParam(':Znumber', $Znumber);
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result= $stmt->fetchall();
            if (count($result) == 0) {
                //did not find matching znumber
                include "loginecho.php";
                throw new Exception("Please login again");
            }
            //check time
            
            $current = date("d/m/y : H:i:s", time());
            if ($current > $result[0]["Date"]){
                print_r($result);
                    //previous session expired delete last visit
                    $stmt = $conn->prepare("DELETE FROM Visit WHERE 
                    Znumber=:Znumber");
                    $stmt->bindParam(':Znumber', $Znumber);
                    $stmt->execute();            
                
                    include "loginecho.php";
                    throw new Exception("Due to inactivity, please login again");
            }
            if ($_SESSION["id"]== $result[0]["TempID"]){
                //valid time and id
                //check if staff
                $stmt = $conn->prepare("SELECT * FROM Type WHERE 
                Znumber=:Znumber");
                $stmt->bindParam(':Znumber', $Znumber);
                $stmt->execute();
                $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result= $stmt->fetchall();
                if (count($result) == 0) {
                    //did not find matching znumber
                    throw new Exception("You do not have access to this page");
                    
                }
                //user is staff or admin
                $verified = true;
                //generate new TempID
                $newtemp = bin2hex(random_bytes(5));
                $_SESSION["id"]=$newtemp;
                $stmt = $conn->prepare("UPDATE Visit SET TempID = :TempID, Date = :Date WHERE Znumber = :Znumber 
                ");
                $current = date("d/m/y : H:i:s", time()+ 3600);
                $stmt->bindParam(':Znumber', $_SESSION["znum"]);
                $stmt->bindParam(':TempID', $_SESSION["id"]);
                $stmt->bindParam(':Date', $current);
                $stmt->execute();
                //update database
                $stmt->execute();


            }
 
            
            //Valid Login           

        ?>