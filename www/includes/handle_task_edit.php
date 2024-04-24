<?php
    session_start();
    include_once("../includes/init_sql.php");
    require("../utils/test_input.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $task_id = test_input($_POST["task_id"]);
        $task_name = test_input($_POST["new_name"]);
        $task_description = test_input($_POST["new_description"]);

        $task_date_day = test_input($_POST["new_date_day"]);
        $task_date_month = test_input($_POST["new_date_month"]);
        $task_date_year = test_input($_POST["new_date_year"]);

        $task_date = "$task_date_year-$task_date_month-$task_date_day";

        $user_id = $_SESSION["user"]["user_id"];
        
        if(!checkdate($task_date_month, $task_date_day, $task_date_year) || !$task_name || !$task_description || db_request("SELECT COUNT(*) FROM tasks WHERE task_id = $task_id AND user_id = $user_id;", $bdd) -> fetchColumn() == 0){
            http_response_code(422);
        } else {
            db_request("UPDATE tasks SET task_name = '$task_name', task_description = '$task_description', task_date = '$task_date' WHERE task_id = $task_id AND user_id = $user_id;", $bdd);
    
            http_response_code(200);
            exit();
        }
    } else {
        http_response_code(405); // Method Not Allowed
        exit();
    }
?>
