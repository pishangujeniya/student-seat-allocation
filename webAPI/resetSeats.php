<?php
include 'config.php';
$servername = $config['DB_HOST'];
$username   = $config['DB_USERNAME'];
$password   = $config['DB_PASSWORD'];
$dbname     = $config['DB_DATABASE'];

$number_of_seats = 3;

$output_array = array();

    $conn          = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

        $sql = "UPDATE branch set seats_available  = '".$number_of_seats."'";

        $row_id = 0;

        if ($conn->query($sql) === TRUE) {
           
                $output_array["success"] = "true";
        
        } else {
            $output_array["error"] = "Error : Student has already 5 Choices Filled";
            $output_array["success"] = "false";
        }
        


    $conn->close();
       


echo json_encode($output_array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);

?>