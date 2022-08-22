<?php  
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $dbHost="localhost";
    $dbName="javi";
    $dbUser="javiuser";      //by default root is user name.  
    $dbPassword="Allied@2020";     //password is blank by default  


    try{  
        $dbConn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPassword); 
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //PDO error mode to exception 
        // Echo "Successfully connected with database";
    }catch(Exception $e){
        echo "Connection failed" . $e->getMessage();
    }


    // $dbConn= new mysqli($dbHost,$dbName,$dbUser,$dbPassword);

    // if ($dbConn->connect_error) {
    //     die("Connection failed: " . $dbConn->connect_error);
    //   }
    //   echo "Connected successfully";



      
?>