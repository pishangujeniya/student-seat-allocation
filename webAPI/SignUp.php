<?php
include 'config.php';
$servername = $config['DB_HOST'];
$username = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$dbname = $config['DB_DATABASE'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$output_array = array();  
$output_array["success"] = "false";


if(!empty($_POST['std_name']) && !empty($_POST['std_marks']) && !empty($_POST['std_password'])){

$std_name = $_POST['std_name'];
$std_marks = $_POST['std_marks'];
$std_password = $_POST['std_password'];

if($std_marks <=1000){


// Check connection
if ($conn->connect_error) {
    die("Connection failed  " . $conn->connect_error);
}

        $sql = "INSERT INTO students (std_name, std_password, std_marks)
        VALUES ('".$std_name."', '".$std_password."', '".$std_marks."')";

        if ($conn->query($sql) === TRUE) {

            $getuid = "SELECT * from students WHERE std_name = '".$std_name."' and std_password = '".$std_password."' and std_marks = '".$std_marks."' and dead = 0";
            
            if ($res = $conn->query($getuid)) {
                if($res->num_rows > 0){
                    $row = $res->fetch_array();
                   
                    $ruid = $row['std_id'];

                            $output_array["success"] = "true";
                            $output_array["std_id"] = $ruid;

                }else{
                    $output_array["success"] = "false";
                }
            } else {
                $output_array["success"] = "false";
                $output_array["error"]  = "Error: " . $sql . "Err ". $conn->error;
            }
        } else {
            $output_array["success"] = "false";
            $output_array["error"] = "SQL: " . $sql . "Err" . $conn->error;
        }
        $conn->close();
}

}

echo json_encode($output_array,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);
include 'rank_generator.php';
?>