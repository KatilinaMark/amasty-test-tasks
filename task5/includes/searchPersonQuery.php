<?php
    require_once 'dbconn.inc.php';

    if(isset($_POST['search-person'])){
        $personName = $_POST['person-name'];

        $query = "SELECT fullname, balance FROM persons WHERE fullname LIKE '$personName'";

        $result = mysqli_query($dbConn, $query);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "Fullname: " . $row["fullname"]. "<br>Balance: " . $row["balance"]."<br>";
            }
          } else {
            echo "0 results";
          }
          
          mysqli_close($dbConn);
    }  
?>
