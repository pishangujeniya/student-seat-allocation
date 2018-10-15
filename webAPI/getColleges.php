<?php
include 'config.php';
$servername = $config['DB_HOST'];
$username = $config['DB_USERNAME'];
$password = $config['DB_PASSWORD'];
$dbname = $config['DB_DATABASE'];   

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$output_array = array(); 
// if (empty($_POST['userName']) || empty($POST['userPassword']) || empty($_POST['userEmail'])){
//     echo "Khali Requesto Nai Padvani... Honnnn";
// }else{
        
        $sql = "SELECT * FROM `college`;";

        if ($res = $conn->query($sql)) {
            if($res->num_rows > 0){

                $row_id = 0;

                while($row = $res->fetch_assoc()){

                    $rcollege_id = $row['college_id'];
                    $rcollege_city = $row['college_city'];
                    $rcollege_name = $row['college_name'];
                    $rdead = $row['dead'];
    
                    $output_array["success"] = "true";
                   
                    $clip_array = array();
    
                    $clip_array["college_id"] = $rcollege_id;
                    $clip_array["college_city"] = $rcollege_city;
                    $clip_array["college_name"] = $rcollege_name;
                    $clip_array["dead"] = $rdead;

                    array_push($output_array,$clip_array);
                    // $output_array[".$row_id."] = $clip_array;
                    $row_id =  $row_id + 1;
                }

            }else{
                $output_array["success"] = "false";
            }
        } else {
            $output_array["error"]  = "Error: " . $sql . "<br>" . $conn->error;
        }
// }

echo json_encode($output_array,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);
$conn->close();
?>