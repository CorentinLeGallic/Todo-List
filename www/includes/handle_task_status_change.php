<?php
    session_start();
    include_once("../includes/init_sql.php");
    require("../utils/test_input.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $task_id = test_input($_POST["task_id"]);
        $new_status = test_input($_POST["new_status"]);
        $user_id = test_input($_SESSION["user"]["user_id"]);

        db_request("UPDATE tasks SET task_status = '$new_status' WHERE task_id = $task_id AND user_id = $user_id;", $bdd);

        http_response_code(200);
        exit();
    } else {
        http_response_code(405); // Method Not Allowed
        exit();
    }
?>
