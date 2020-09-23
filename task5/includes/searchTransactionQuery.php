<?php
    require_once 'dbconn.inc.php';

    if(isset($_POST['search-transaction'])){
        $query = "SELECT * FROM transactions WHERE (SELECT persons.city_id FROM persons WHERE transactions.from_person_id = persons.id) = (SELECT persons.city_id FROM persons WHERE transactions.to_person_id = persons.id)";

        $result = mysqli_query($dbConn, $query);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo 'Transaction id: '.$row['transaction_id']."<br>from_person_id: ".$row['from_person_id']."<br>to_person_id: ".$row['to_person_id']."<br>Amount: ".$row['amount'];
            }
          } else {
            echo "0 results";
          }
          
          mysqli_close($dbConn);
    }  

?>

