<?php
include 'config.php';
$servername = $config['DB_HOST'];
$username   = $config['DB_USERNAME'];
$password   = $config['DB_PASSWORD'];
$dbname     = $config['DB_DATABASE'];

$number_of_choices = 5;

$std_id = $_POST['std_id'];

$output_array = array();

    $conn          = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

        $sql = "SELECT choice_id from choice WHERE dead = 0 and std_id = '".$std_id."'";

        $row_id = 0;

        if ($res = $conn->query($sql)) {
            if($res->num_rows > 0){

                while($row = $res->fetch_assoc()){
                    $row_id =  $row_id + 1;
                }

            }else{
                $output_array["success"] = "true";
                $output_array["choice_selected"] = "true";
            }
        } else {
            $output_array["error"] = "Error : Student has already 5 Choices Filled";
            $output_array["choice_selected"] = "true";
            $output_array["success"] = "false";
        }

        if($row_id < 5){
            $output_array["choice_selected"] = "false";
            $output_array["success"] = "true";
        }else{
            $output_array["success"] = "true";
            $output_array["choice_selected"] = "true";
            $output_array["error"] = "Error : User has already 5 Choices Filled";
        }
        


    $conn->close();
       


echo json_encode($output_array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);

?>