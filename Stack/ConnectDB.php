<?php
	
	$DB_host = "localhost";
	$DB_user = "root";
	$DB_pass = "june08";
	$DB_name = "TestStack";
	
	ini_set( "display_errors", 0); 
	header('Content-Type: text/html; charset=utf-8');
	$con = mysqli_connect($DB_host, $DB_user, $DB_pass, $DB_name);
	
	if(mysqli_connect_error()){
        die("ผิดพลาดในการเชื่อมต่อฐานข้อมูล:<br>" . mysqli_connect_error());
    }
        mysqli_set_charset($con,"utf8");
        
        $CreateDB = "CREATE DATABASE TestStack"; 
        if (mysqli_query($con, $CreateDB)) {
            $con = mysqli_connect($DB_host, $DB_user, $DB_pass, $DB_name);
        } else {
             echo "Error creating database: " . mysqli_error($con);
}    
        // sql to create table
        $CreateTB = "CREATE TABLE stack_data(
                index_data INT(5) AUTO_INCREMENT PRIMARY KEY,
                value INT(5) NOT NULL )";
       if (mysqli_query($con, $CreateTB)) {
            echo "Table stack_data created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($con);
}

       
?>

