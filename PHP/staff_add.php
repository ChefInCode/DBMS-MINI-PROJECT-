<?php

// Connect to the database securely
// ... (implement secure connection with prepared statements)
$host='localhost';
 $port=5432;
 $dbname="COLLEGEDB";
 $user="postgres";
 $password="962058";


 // Connect to the database securely
 // ... (implement secure connection with prepared statements)
 try{
    $db_connection=new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $db_connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// Prepare and execute the query
 // Receive and validate data from the client-side script
 $staff_name = filter_input(INPUT_POST,'staff_name', FILTER_UNSAFE_RAW);
 $designation = filter_input(INPUT_POST,'designation', FILTER_UNSAFE_RAW);

 // ... (validate other fields similarly)
 

 
 // Prepare and execute the query for insertion
 $sql = "INSERT INTO staff (staff_name,designation) VALUES (?, ?)";
 $stmt = $db_connection->prepare($sql);
 $stmt->execute([$staff_name, $designation]);
 
 // Check for successful insertion and send a response
 if ($stmt->rowCount() === 1) {
     $response = array("success" => true, "message" => "Staff member added successfully!");
 } else {
     $response = array("success" => false, "message" => "Error adding staff member!");
 }
 
 echo json_encode($response);
 
 // Close the database connection
 // ... (close connection securely)
 
}
catch(PDOException $e){
echo"error: $e.getMessage()";

}
// Close the database connection
// ... (close connection securely)

?>
