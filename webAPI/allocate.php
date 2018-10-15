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

$clear_allocate_sql = "DELETE from allocation";

if ($conn->query($clear_allocate_sql) === TRUE) {
    echo "Cleared Allocation Table";
}else{
    echo "Cleared Allocation  Failed";
}

$rankers_sql = "SELECT std_id FROM `students` where std_id not in (select std_id from allocation) ORDER by std_rank asc";

if ($res = $conn->query($rankers_sql)) {
    if($res->num_rows > 0){

        $row_id = 0;

        while($row = $res->fetch_assoc()){

            $r_std_id = $row['std_id'];
            
            $preference_choices_sql = "SELECT * FROM `choice` WHERE std_id = '".$r_std_id."' ORDER by pref asc";

            if ($choice_result = $conn->query($preference_choices_sql)) {
                if($choice_result->num_rows > 0){
                    
                    while($choice_row = $choice_result->fetch_assoc()){
                        
                        $preffered_branch_id = $choice_row['branch_id'];
                        $preffered_choice_id = $choice_row['choice_id'];

                        $checking_seats_available_sql = "SELECT * FROM `branch` where seats_available > 0 and branch_id = '".$preffered_branch_id."'";

                        if ($checking_seats_available_result = $conn->query($checking_seats_available_sql)) {
                            if($checking_seats_available_result->num_rows > 0){
                                
                                $check_allocated_already_sql = "SELECT * FROM `allocation` where std_id = '".$r_std_id."'";

                                if($check_allocated_already_result = $conn->query($check_allocated_already_sql)){
                                    if($check_allocated_already_result->num_rows > 0){
                                        // USer is already allocated
                                    }else{
                                        // Now Enter into Allocation
                                        $allocate_insert_sql = "INSERT INTO allocation (std_id, choice_id, dead)
                                        VALUES ('".$r_std_id."', '".$preffered_choice_id."', '0')";

                                        if ($conn->query($allocate_insert_sql) === TRUE) {
                                            
                                            echo "<br>Allocated";

                                            $decrement_seats = "UPDATE branch SET seats_available = seats_available - 1 WHERE branch_id = '".$preffered_branch_id."' and seats_available > 0";

                                            if ($conn->query($decrement_seats) === TRUE) {
                                                echo " <br> Seat Decremented <br> <hr>";
                                            }
                                        }
                                    }
                                }

                            }
                        }
                    }

                }
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