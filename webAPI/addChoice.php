<?php
include 'config.php';
$servername = $config['DB_HOST'];
$username   = $config['DB_USERNAME'];
$password   = $config['DB_PASSWORD'];
$dbname     = $config['DB_DATABASE'];

$number_of_choices = 5;


$std_id = $_POST['std_id'];

$output_array = array();

if (isset($_POST['choice_json'])) {
    $choice_json = json_decode(json_encode($_POST['choice_json']), true);

    // Create connection
    
    $output_array["choices_length"] = count($choice_json);
    
    $choice_length = count($choice_json);
    $conn          = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    for ($pp = 1; $pp <= $choice_length; $pp++) {
        
        
        $collge_name = $choice_json[$pp]["college_name"];
        $branch_name = $choice_json[$pp]["branch_name"];

        $sql = "SELECT choice_id from choice WHERE dead = 0 and std_id = '".$std_id."'";

        $row_id = 0;

        if ($res = $conn->query($sql)) {
            if($res->num_rows > 0){

                while($row = $res->fetch_assoc()){
                    $row_id =  $row_id + 1;
                }

            }else{
                $output_array["success"] = "false";
            }
        } else {
            $output_array["error"]  = "Error: ". $conn->error;
        }

        if($row_id < 5){
            $sql = "INSERT INTO `choice` (`std_id`, `pref`, `college_id`, `branch_id`, `dead`) VALUES ('".$std_id."', '".$pp."', (select college_id from college where dead = 0 and college_name = '".$collge_name."'), (select branch_id from branch where dead = 0 and branch_name = '".$branch_name."' and college_id = (select college_id from college where dead = 0 and college_name = '".$collge_name."')), '0')";

            // $sql = "INSERT INTO `choice` (`std_id`, `pref`, `college_id`, `branch_id`, `dead`) VALUES ('1', '1', (select college_id from college where dead = 0 and college_name = 'DDU'), (select branch_id from branch where dead = 0 and branch_name = 'Information Technology' and college_id =  (select college_id from college where dead = 0 and college_name = 'DDU')), '0')";
            
            if ($conn->query($sql) === TRUE) {
                    $output_array["success"] = "true";
                
            } else {
                $output_array["error"] = "Error: " . $conn->error;
            }
        }else{
            $output_array["success"] = "false";
            $output_array["error"] = "Error : User has already 5 Choices Filled";
        }
        
    }

    $conn->close();
       
}


echo json_encode($output_array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);

?>