 <?php
 $host='localhost';
 $port=5432;
 $dbname="COLLEGEDB";
 $user="postgres";
 $password="962058";


 try{
    $db_connection=new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $db_connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo"CONNECTION SUCCESSFULLY WITH POSTGRESQL!";

 }
 catch(PDOException $e){
echo"error: $e.getMessage()";

 }