
<?php
    if(isset($_POST["product"])){
        $invite = $_POST["product"];
        print_r($invite);
    }
else {echo "Did not work";}
?>