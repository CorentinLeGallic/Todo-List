<?php
    session_start();
    include_once("../includes/init_sql.php");
    require("../utils/test_input.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $task_id = test_input($_POST["task_id"]);

        $user_id = $_SESSION["user"]["user_id"];
        
        if(!$task_id || db_request("SELECT COUNT(*) FROM tasks WHERE task_id = $task_id AND user_id = $user_id;", $bdd) -> fetchColumn() == 0){
            http_response_code(422);
        } else {
            db_request("DELETE FROM tasks WHERE task_id = $task_id AND user_id = $user_id;", $bdd);
    
            http_response_code(200);
            exit();
        }
    } else {
        http_response_code(405); // Method Not Allowed
        exit();
    }
?>
