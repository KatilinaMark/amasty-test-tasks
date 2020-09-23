<?php
    require_once 'dbconn.inc.php';

    if(isset($_POST['search-city'])){
        $query = "SELECT name FROM cities WHERE id = (SELECT persons.city_id FROM persons, transactions WHERE persons.id = transactions.from_person_id GROUP BY persons.city_id ORDER BY COUNT(*) DESC LIMIT 1)";

        $result = mysqli_query($dbConn, $query);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "City name: " . $row["name"];
            }
          } else {
            echo "0 results";
          }
          
          mysqli_close($dbConn);
    }  
?>


