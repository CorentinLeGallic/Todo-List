<?php
    $tasks = db_request("SELECT * FROM tasks WHERE user_id = '" . $_SESSION["user"]["user_id"] . "';", $bdd) -> fetchAll();
    $weeks = [];
    foreach($tasks as $task){
        $date = new DateTime($task["task_date"]);
        $week = $date -> format("W");
        $day = $task["task_date"];
        // $day = date('w', strtotime($task["task_date"]));
        if(array_key_exists($week, $weeks)){
            if(array_key_exists($day, $weeks[$week])){
                array_push($weeks[$week][$day], $task);
            } else {
                $weeks[$week][$day] = [$task];
            }
        } else {
            $weeks[$week] = [$day => [$task]];
        }
    }
    foreach($weeks as $weekNumber => $days):
?>
<li class="week">
    <h4 class="week-number">
    <?php 
        echo "Semaine N°" . $weekNumber . " :";
    ?>
    </h4>
    <ul class="days">
        <?php foreach($days as $day => $tasks):?>
            <li class="day">
                <h5 class="day-value">
                    <?php
                        setlocale(LC_TIME, 'fr_FR', "French_France", "French");
                        date_default_timezone_set('Europe/Paris');
                        echo strtoupper(strftime("%A %d %B", strtotime($day)));
                    ?>
                </h5>
                <!-- <hr class="day-separator"> -->
                <ul class="tasks">
                    <?php foreach($tasks as $task): ?>
                    <li class="task">
                        <h6 class="task-title"><?php echo $task["task_name"]; ?></h6>
                        <p class="task-description"><?php echo $task["task_description"]; ?></p>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</li>
<?php
    endforeach;
?>