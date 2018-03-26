        <?php
                
        try{
            $verified = false;
            //cookie
            if (isset($_COOKIE["email"])){
                $email = htmlspecialchars($_COOKIE["email"]); 
                $tempID = htmlspecialchars($_COOKIE["ID"]); 
            }
            else {
                include "loginecho.php";
                throw new Exception("Due to inactivity, please login again");
            }
            //entering mysql
            $myfile = null;
            
            $servername = "localhost";
            $username = "CEN4010_S2018g05";
            $password = "SQLgroup5";
            //connecting to mysql
            $conn = new PDO("mysql:host=$servername;dbname=CEN4010_S2018g05",trim($username),trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //searching for matching username
            $stmt = $conn->prepare("SELECT * FROM Users WHERE 
            Email='$email'");
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result= $stmt->fetchall();
            if (count($result) == 0) {
                //did not find matching username and password
                include "loginecho.php";
                throw new Exception("Account not found or incorrect password. Please try again");
            }
            //stores array in account then into individual variables
            $account = $result[0];
            $Znumber = $account["Znumber"];
            $email = $acount["Email"];
            $result[0]=null;
            $account = null;
            //determine if password or cookie was used

                $stmt = $conn->prepare("SELECT * FROM Visit WHERE 
                Znumber='$Znumber'");
                $stmt->execute();
                $result= $stmt->fetchall();
                $IDval = $result[0]["TempID"];
                $Time = $result[0]["Time"];
                $result[0]=null;
                //compare time if >1hour not valid
                $current = date("d/m/y : H:i:s", time());
                if ($current > $Time){
                    include "loginecho.php";
                    throw new Exception("Due to inactivity, please login again");
                }
                //check if matching ID
                if ($tempID == $IDval){
                    $verified = true;
                    //generate new TempID
                    $newtemp = var_dump(bin2hex(random_bytes(5)));
                    //set cookie
                    setkookie("email", $email, time() + 3600, "/")
                    setkookie("ID", $newtemp, time() + 3600, "/")
                    //update database
                    $current = date("d/m/y : H:i:s", time()+ 3600);
                    $stmt = $conn->prepare("UPDATE Visit SET TempID='$newtemp' AND Time ='$current' WHERE Znumber='$Znumber'");
                    $stmt->execute();
                
            }
            
            //Valid Login           

        ?>