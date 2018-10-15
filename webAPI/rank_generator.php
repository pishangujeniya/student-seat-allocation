<?php

include 'config.php';
$servername = $config['DB_HOST'];
$username = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$dbname = $config['DB_DATABASE'];
 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$rg_output_array = array(); 

$sql = "SELECT `std_id`, `std_name`, `std_marks`, FIND_IN_SET( `std_marks`, (
    SELECT GROUP_CONCAT( `std_marks`
    ORDER BY `std_marks` DESC ) 
    FROM students )
    ) AS `std_rank`
    FROM students";

if ($res = $conn->query($sql)) {
    if($res->num_rows > 0){

        $row_id = 0;

        while($row = $res->fetch_assoc()){

            $r_std_id = $row['std_id'];
            $r_std_rank = $row['std_rank'];

            $update_sql = "UPDATE students SET std_rank = '".$r_std_rank."' WHERE std_id = '".$r_std_id."'";

        if ($conn->query($update_sql) === TRUE) {
            $rg_output_array["std_id ".$r_std_id] =" Rank ".$r_std_rank;
        }

    }

        $rg_output_array["success"] = "true";

    }else{
        $rg_output_array["success"] = "false";
    }
} else {
    $rg_output_array["error"]  = "Error: " . $sql . "Err" . $conn->error;
}




$conn->close();


?>