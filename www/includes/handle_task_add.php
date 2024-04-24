<?php
    session_start();
    include_once("../includes/init_sql.php");
    require("../utils/test_input.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $task_name = test_input($_POST["name"]);
        $task_description = test_input($_POST["description"]);

        $task_date_day = test_input($_POST["date_day"]);
        $task_date_month = test_input($_POST["date_month"]);
        $task_date_year = test_input($_POST["date_year"]);

        $task_date = "$task_date_year-$task_date_month-$task_date_day";

        $user_id = $_SESSION["user"]["user_id"];
        
        if(!checkdate($task_date_month, $task_date_day, $task_date_year) || !$task_name || !$task_description){
            http_response_code(422);
        } else {
            db_request("INSERT INTO tasks (user_id, task_name, task_description, task_date) VALUES ($user_id, '$task_name', '$task_description', '$task_date');", $bdd);
    
            http_response_code(200);
            exit();
        }
    } else {
        http_response_code(405); // Method Not Allowed
        exit();
    }
?>
