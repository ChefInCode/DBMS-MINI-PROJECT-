<?php

// Connect to the database securely
// ... (implement secure connection with prepared statements)
$host='localhost';
 $port=5432;
 $dbname="COLLEGEDB";
 $user="postgres";
 $password="962058";


 try{
    $db_connection=new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $db_connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// Prepare and execute the query
    $sql = "SELECT staff_name,designation FROM staff";
    $stmt = $db_connection->prepare($sql);
    $stmt->execute();

// Fetch and encode data
    $staff_data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $staff_data[] = $row;
    }
    $encoded_data = json_encode($staff_data);

// Send the encoded data back to the client
    echo $encoded_data;
}
catch(PDOException $e){
echo"error: $e.getMessage()";

}
// Close the database connection
// ... (close connection securely)

?>
