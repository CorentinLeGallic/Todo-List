<?php
    $title = "Ma liste - Todo List";
    include_once("../includes/head.php");
    require("../utils/getWeekStartAndEnd.php");
    require("../utils/date_to_french.php");
?>
<body>
    <div id="overlay"></div>
    <?php include_once("../includes/header.php"); ?>
    <!-- <div id="edit-menu" class="change-menu">
        <h2 id="edit-menu-title" class="change-menu-title">Modifier une tâche</h2>
        <hr>
        <form action="" id="edit-form">
            <div class="edit-input-container">
                <label class="edit-label" for="edit-title">Titre :</label>
                <input class="edit-input" type="text" name="edit-title" id="edit-title" required>
            </div>
            <div class="edit-input-container">
                <label class="edit-label" for="edit-description">Description :</label>
                <textarea class="edit-input" name="edit-description" id="edit-description" cols="30" rows="5" required></textarea>
            </div>
            <div class="edit-input-container">
                <label class="edit-label" for="edit-date">Date (JJ/MM/AAAA) :</label>
                <div class="edit-date-container">
                    <input type="text" name="edit-date-day" id="date-day" class="edit-date edit-input" minlength="2" maxlength="2" required>
                    <p class="edit-date-separator">/</p>
                    <input type="text" name="edit-date-month" id="date-month" class="edit-date edit-input" minlength="2" maxlength="2" required>
                    <p class="edit-date-separator">/</p>
                    <input type="text" name="edit-date-year" id="date-year" class="edit-date edit-input" minlength="4" maxlength="4" required>
                </div>
            </div>
            <div id="edit-error">
                <svg width="24px" height="24px" viewBox="0 0 24 24" id="error-icon">
                    <g id="error" stroke="none" fill="none" fill-rule="evenodd" transform="translate(3.000000, 3.000000)">
                        <path
                            d="M9,12 C9.55228475,12 10,12.4477153 10,13 C10,13.5522847 9.55228475,14 9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 Z"
                            id="error-icon-path1" fill="#666666" fill-rule="nonzero"></path>
                        <path
                            d="M9,9.5 L9,4.5 L9,9.5 Z M9,18 C4.029,18 0,13.971 0,9 C0,4.029 4.029,0 9,0 C13.971,0 18,4.029 18,9 C18,13.971 13.971,18 9,18 Z"
                            id="error-icon-path2" stroke="#666" stroke-width="1.5" stroke-linecap="round"></path>
                    </g>
                </svg>
                <p id="error-text">Une erreur est survenue. Veuillez ré-essayer.</p>
            </div>
            <div id="edit-submit-container">
                <button type="button" id="cancel-edit">Annuler</button>
                <button type="submit" id="save-edit">Valider</button>
            </div>
        </form>
    </div> -->
    <div id="edit-menu" class="change-menu">
        <h2 id="edit-menu-title" class="change-menu-title">Modifier une tâche</h2>
        <hr>
        <form action="" id="edit-form" class="change-form">
            <div class="edit-input-container change-input-container">
                <label class="edit-label change-label" for="edit-title">Titre :</label>
                <input class="edit-input change-input" type="text" name="edit-title" id="edit-title" required>
            </div>
            <div class="edit-input-container change-input-container">
                <label class="edit-label change-label" for="edit-description">Description :</label>
                <textarea class="edit-input change-input change-description" name="edit-description" id="edit-description" cols="30" rows="5" required></textarea>
            </div>
            <div class="edit-input-container change-input-container">
                <label class="edit-label change-label" for="edit-date">Date (JJ/MM/AAAA) :</label>
                <div class="edit-date-container change-date-container">
                    <input type="text" name="edit-date-day" id="edit-date-day" class="edit-date edit-input change-date change-input" minlength="2" maxlength="2" required>
                    <p class="edit-date-separator change-date-separator">/</p>
                    <input type="text" name="edit-date-month" id="edit-date-month" class="edit-date edit-input change-date change-input" minlength="2" maxlength="2" required>
                    <p class="edit-date-separator change-date-separator">/</p>
                    <input type="text" name="edit-date-year" id="edit-date-year" class="edit-date edit-input change-date change-input" minlength="4" maxlength="4" required>
                </div>
            </div>
            <div id="edit-error" class="change-error">
                <svg width="24px" height="24px" viewBox="0 0 24 24" class="error-icon">
                    <g class="error" stroke="none" fill="none" fill-rule="evenodd" transform="translate(3.000000, 3.000000)">
                        <path
                            d="M9,12 C9.55228475,12 10,12.4477153 10,13 C10,13.5522847 9.55228475,14 9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 Z"
                            class="error-icon-path1" fill="#666666" fill-rule="nonzero"></path>
                        <path
                            d="M9,9.5 L9,4.5 L9,9.5 Z M9,18 C4.029,18 0,13.971 0,9 C0,4.029 4.029,0 9,0 C13.971,0 18,4.029 18,9 C18,13.971 13.971,18 9,18 Z"
                            class="error-icon-path2" stroke="#666" stroke-width="1.5" stroke-linecap="round"></path>
                    </g>
                </svg>
                <p id="edit-error-text" class="change-error-text">Une erreur est survenue. Veuillez ré-essayer.</p>
            </div>
            <div id="edit-submit-container" class="change-submit-container">
                <button type="button" id="cancel-edit" class="cancel-change">Annuler</button>
                <button type="submit" id="save-edit" class="save-change">Valider</button>
            </div>
        </form>
        <!-- Titre - description - date (format JJ-MM-AAAA en 3 inputs séparés par "/" comme sur parcoursup) -->
    </div>
    <div id="add-menu" class="change-menu">
        <h2 id="add-menu-title" class="change-menu-title">Ajouter une tâche</h2>
        <hr>
        <form action="" id="add-form" class="change-form">
            <div class="add-input-container change-input-container">
                <label class="add-label change-label" for="add-title">Titre :</label>
                <input class="add-input change-input" type="text" name="add-title" id="add-title" required>
            </div>
            <div class="add-input-container change-input-container">
                <label class="add-label change-label" for="add-description">Description :</label>
                <textarea class="add-input change-input change-description" name="add-description" id="add-description" cols="30" rows="5" required></textarea>
            </div>
            <div class="add-input-container change-input-container">
                <label class="add-label change-label" for="add-date">Date (JJ/MM/AAAA) :</label>
                <div class="add-date-container change-date-container">
                    <input type="text" name="add-date-day" id="add-date-day" class="add-date add-input change-date change-input" minlength="2" maxlength="2" required>
                    <p class="add-date-separator change-date-separator">/</p>
                    <input type="text" name="add-date-month" id="add-date-month" class="add-date add-input change-date change-input" minlength="2" maxlength="2" required>
                    <p class="add-date-separator change-date-separator">/</p>
                    <input type="text" name="add-date-year" id="add-date-year" class="add-date add-input change-date change-input" minlength="4" maxlength="4" required>
                </div>
            </div>
            <div id="add-error" class="change-error">
                <svg width="24px" height="24px" viewBox="0 0 24 24" class="error-icon">
                    <g class="error" stroke="none" fill="none" fill-rule="evenodd" transform="translate(3.000000, 3.000000)">
                        <path
                            d="M9,12 C9.55228475,12 10,12.4477153 10,13 C10,13.5522847 9.55228475,14 9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 Z"
                            class="error-icon-path1" fill="#666666" fill-rule="nonzero"></path>
                        <path
                            d="M9,9.5 L9,4.5 L9,9.5 Z M9,18 C4.029,18 0,13.971 0,9 C0,4.029 4.029,0 9,0 C13.971,0 18,4.029 18,9 C18,13.971 13.971,18 9,18 Z"
                            class="error-icon-path2" stroke="#666" stroke-width="1.5" stroke-linecap="round"></path>
                    </g>
                </svg>
                <p id="add-error-text" class="change-error-text">Une erreur est survenue. Veuillez ré-essayer.</p>
            </div>
            <div id="add-submit-container" class="change-submit-container">
                <button type="button" id="cancel-add" class="cancel-change">Annuler</button>
                <button type="submit" id="save-add" class="save-change">Valider</button>
            </div>
        </form>
        <!-- Titre - description - date (format JJ-MM-AAAA en 3 inputs séparés par "/" comme sur parcoursup) -->
    </div>
    <div id="delete-menu" class="change-menu">
        <h2 id="delete-menu-title" class="change-menu-title">Supprimer une tâche</h2>
        <hr>
        <div id="delete-container">
            <p id="delete-text">Êtes-vous sûr de vouloir supprimer cette tâche ?</p>
            <div id="delete-error" class="change-error">
                <svg width="24px" height="24px" viewBox="0 0 24 24" id="error-icon">
                    <g id="error" stroke="none" fill="none" fill-rule="evenodd" transform="translate(3.000000, 3.000000)">
                        <path
                            d="M9,12 C9.55228475,12 10,12.4477153 10,13 C10,13.5522847 9.55228475,14 9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 Z"
                            id="error-icon-path1" fill="#666666" fill-rule="nonzero"></path>
                        <path
                            d="M9,9.5 L9,4.5 L9,9.5 Z M9,18 C4.029,18 0,13.971 0,9 C0,4.029 4.029,0 9,0 C13.971,0 18,4.029 18,9 C18,13.971 13.971,18 9,18 Z"
                            id="error-icon-path2" stroke="#666" stroke-width="1.5" stroke-linecap="round"></path>
                    </g>
                </svg>
                <p id="error-text" class="change-error-text">Une erreur est survenue. Veuillez ré-essayer.</p>
            </div>
            <div id="delete-submit-container">
                <button id="cancel-delete" class="cancel-change">Annuler</button>
                <button id="save-delete" class="save-change">Valider</button>
            </div>
        </div>
    </div>
    <main id="mylist-main">
        <section id="top-row">
            <div id="categories">
                <div id="all-cat" class="category">
                    <label for="all" class="category-label">Toutes</label>
                    <input id="all" type="radio" name="category" value="all" checked>
                </div>
                <div id="completed-cat" class="category">
                    <label for="completed" class="category-label">Terminées</label>
                    <input id="completed" type="radio" name="category" value="completed">
                </div>
                <div id="ongoing-cat" class="category">
                    <label for="ongoing" class="category-label">En cours</label>
                    <input id="ongoing" type="radio" name="category" value="ongoing">
                </div>
                <div id="upcoming-cat" class="category">
                    <label for="upcoming" class="category-label">A venir</label>
                    <input id="upcoming" type="radio" name="category" value="upcoming">
                </div>
                <div id="expired-cat" class="category">
                    <label for="expired" class="category-label">En retard</label>
                    <input id="expired" type="radio" name="category" value="expired">
                </div>
            </div>
            <button class="add-task">Ajouter une tâche</button>
        </section>
        </div>
        <div id="tasks-dropdown">
            <div class="task-option" id="edit-task">
                <img draggable="false" data-img="edit" />
                <!-- <img draggable="false" src='../assets/images/edit.png' /> -->
                <span>Modifier</span>
            </div>
            <div class="task-option" id="delete-task">
                <img draggable="false" src='../assets/images/delete.png' />
                <!-- <img draggable="false" src='../assets/images.png' /> -->
                <span>Supprimer</span>
            </div>
        </div>
        <ul id="weeks">
            <?php
                $tasks = db_request("SELECT * FROM tasks WHERE user_id = '" . $_SESSION["user"]["user_id"] . "';", $bdd) -> fetchAll(\PDO::FETCH_ASSOC);
            ?>
            <script>
                let tasks = <?php echo json_encode($tasks);?>
            </script>
            <?php
                $years = [];
                // $weeks = [];
                foreach($tasks as $task){
                    $date = new DateTime($task["task_date"]);
                    $year = $date -> format("Y");
                    $week = $date -> format("W");
                    $day = $task["task_date"];
                    // $day = date('w', strtotime($task["task_date"]));
                    if(array_key_exists($year, $years)){
                        if(array_key_exists($week, $years[$year])){
                            if(array_key_exists($day, $years[$year][$week])){
                                array_push($years[$year][$week][$day], $task);
                            } else {
                                $years[$year][$week][$day] = [$task];
                            }
                        } else {
                            $years[$year][$week] = [$day => [$task]];
                        }
                    } else {
                        $years[$year] = [$week => [$day => [$task]]];
                    }
                    // if(array_key_exists($week, $weeks)){
                    //     if(array_key_exists($day, $weeks[$week])){
                    //         array_push($weeks[$week][$day], $task);
                    //     } else {
                    //         $weeks[$week][$day] = [$task];
                    //     }
                    // } else {
                    //     $weeks[$week] = [$day => [$task]];
                    // }
                }
                // foreach($weeks as $week_number => $days):
                foreach($years as $year_number => $weeks):
            ?>
            <?php 
                foreach($weeks as $week_number => $days):
            ?>
            <li class="week">
                <h4 class="week-number">
                    <?php
                        $date = new Datetime(array_keys($days)[0]);
                        $year = $date -> format("Y");

                        ["week_start" => $week_start, "week_end" => $week_end] = getWeekStartAndEnd($week_number, $year);
                        echo $year_number . " - Semaine N°" . $week_number . " (" . ucwords(date_to_french($week_start, "l j F")) . " - " . ucwords(date_to_french($week_end, "l j F")) . ")" . " :";
                    ?>
                </h4>
                <ul class="days">
                    <?php foreach($days as $day => $tasks):?>
                        <li class="day">
                            <h5 class="day-value">
                                <?php
                                    echo strtoupper(date_to_french($day, "l j F"));
                                    // echo strtoupper(strftime("%A %d %B", strtotime($day)));
                                ?>
                            </h5>
                            <!-- <hr class="day-separator"> -->
                            <ul class="tasks">
                                <?php foreach($tasks as $task): ?>
                                <li class="task" data-id="<?php echo $task["task_id"]; ?>" data-task-date="<?php echo $task["task_date"]; ?>" data-status="<?php
                                        if($task["task_status"] != "default"){
                                            echo $task["task_status"];
                                        } else {
                                            if($task["task_date"] >= date('Y-m-d')){
                                                echo "upcoming";
                                            } else {
                                                echo "expired";
                                            }
                                        }; 
                                    ?>">
                                    <div class="status-container">
                                        <div class="status completed-status<?php echo $task["task_status"] == "completed" ? " active" : "" ?>">
                                            <!-- <img class="status-icon" data-img="completed" alt="" /> -->
                                            <img class="status-icon" src="../assets/images/completed-dark.png" alt="" />
                                        </div>
                                        <div class="status ongoing-status<?php echo $task["task_status"] == "ongoing" ? " active" : "" ?>">
                                            <!-- <img class="status-icon" data-img="ongoing" alt="" /> -->
                                            <img class="status-icon" src="../assets/images/ongoing-dark.png" alt="" />
                                        </div>
                                    </div>
                                    <div class="task-text-container">
                                        <h6 class="task-title" title="<?php echo $task["task_name"]; ?>"><?php echo $task["task_name"]; ?></h6>
                                        <p class="task-description" title="<?php echo $task["task_description"]; ?>"><?php echo $task["task_description"]; ?></p>
                                    </div>
                                    <div class="task-options" data-task-id="<?php echo $task["task_id"]; ?>">
                                        <img class="task-options-icon" data-img="task-options" />
                                    </div>
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
            <?php
                endforeach;
            ?>
        </ul>
        <script type="module">
            import sortTasks from "../scripts/utils/sortTasks.js";
            sortTasks(document.querySelector('input[name="category"]:checked'));
        </script>
        <div id="no-result-container">
                <img id="no-result-img" src="../assets/images/no-result.png" alt="" />
                <p id="no-result-txt">Aucun résultat.</p>
                <button class="add-task">Ajouter une tâche</button>
        </div>
    </main>
</body>

</html>

<!-- CREATE TABLE tasks (task_id INT PRIMARY KEY NOT NULL AURO_INCREMENT, user_id INT NOT NULL, task_name TEXT NOT NULL, task_description TEXTCtrl-C -- exit!_date DATE NOT NULL, task_status ENUM("completed", "ongoing", "upcoming") NOT NULL, FOREIGN KEY (user_id) REFERENCES user(user_id)); -->

<!-- <div onContextMenu={(e) => e.preventDefault()} className={rightClickMenu.isActive ? 'right-click-menu active' : 'right-click-menu'} style={{ left: rightClickMenu.coordinates[0], top: rightClickMenu.coordinates[1] }}>
    <div href="#" className="sort-option" onClick={() => { handleGoalChange(selectedCell, "edit") }}>
        <img draggable="false" src='./medias/edit.png' />
        <span>Modifier</span>
    </div>
    <div href="#" className="sort-option" onClick={() => { handleDelete(selectedCell) }}>
        <img draggable="false" src='./medias/delete.png' />
        <span>Supprimer</span>
    </div>
</div> -->

<!-- .right-click-menu {
    position: absolute;
    background-color: #292929;
    box-shadow: 1px 1px 3px;
    height: max-content;
    width: 200px;
    z-index: 10;
    display: flex;
    flex-direction: column;
    justify-content: center;
    transition: none;
    opacity: 0;
    transform: translateY(-10px);
    pointer-events: none;

    &.active {
        transition: opacity 150ms ease-in-out, transform 150ms ease-in-out;
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .sort-option {
        user-select: none;
        padding: 2px 10px;
        width: 100%;
        height: 30px;
        display: flex;
        flex-direction: row;
        justify-content: left;
        align-items: center;
        gap: 10px;

        &:hover {
        background-color: #353535;
        cursor: pointer;
        }

        img {
        height: 15px;
        }

        span {
        font-size: 15px;
        font-family: "Segoe UI", sans-serif;
        color: rgb(216, 216, 216);
        }
    }
} -->