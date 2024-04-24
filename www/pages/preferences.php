
<?php
    $title = "Préférences - Todo List";
    include_once("../includes/head.php");
    require("../utils/getWeekStartAndEnd.php");
    require("../utils/date_to_french.php");
?>
<body>
    <?php include_once("../includes/header.php"); ?>
    <main id="preferences-main">
        <div id="left-container">
            <h1 id="preferences-title">Préférences</h1>
            <!-- <div id="categories">
                <li class="category">Général</li>
                <li class="category">Apparence</li>
                <li class="category">Autres</li>
            </div> -->
            <div id="categories">
                <div id="global-cat" class="category">
                    <label for="global" class="category-label">Général</label>
                    <input id="global" type="radio" name="category" value="global" checked>
                </div>
                <div id="appearance-cat" class="category">
                    <label for="appearance" class="category-label">Apparence</label>
                    <input id="appearance" type="radio" name="category" value="appearance">
                </div>
                <div id="others-cat" class="category">
                    <label for="others" class="category-label">Autres</label>
                    <input id="others" type="radio" name="category" value="others">
                </div>
            </div>
        </div>
        <div id="main-container">
            <h2 id="selected-category-title">Général</h1>
            <ul class="preferences-list" id="preferences-global"></ul>
            <ul class="preferences-list" id="preferences-appearance">
                <li class="preferences-container appearance-preferences">
                    <span class="preferences-key">Thème :</span>
                    <span class="preferences-value">
                        <div class="preferences-radio-container theme-container">
                            <input type="radio" class="preferences-radio theme-radio" id="light-theme-radio" name="theme-radio"></input>
                            <label class="preferences-label theme-label" id="light-theme-label" for="light-theme-radio">Clair</label>
                        </div>
                        <div class="preferences-radio-container theme-container">
                            <input type="radio" class="preferences-radio theme-radio" id="dark-theme-radio" name="theme-radio"></input>
                            <label class="preferences-label theme-label" id="dark-theme-label" for="dark-theme-radio">Sombre</label>
                        </div>
                        <div class="preferences-radio-container theme-container">
                            <input type="radio" class="preferences-radio theme-radio" id="auto-theme-radio" name="theme-radio"></input>
                            <label class="preferences-label theme-label" id="auto-theme-label" for="auto-theme-radio">Auto</label>
                        </div>
                    </span>
                </li>
                <li class="preferences-container appearance-preferences">
                    <span class="preferences-key">Couleur secondaire :</span>
                    <span class="preferences-value" id="color-value">
                        <div class="preferences-radio-container color-container">
                            <input type="radio" class="color-radio" id="color1-radio" name="color-radio" />
                            <label class="color-label" id="color1-label" for="color1-radio"></label>
                        </div>
                        <div class="preferences-radio-container color-container">
                            <input type="radio" class="color-radio" id="color2-radio" name="color-radio" />
                            <label class="color-label" id="color2-label" for="color2-radio"></label>
                        </div>
                        <div class="preferences-radio-container color-container">
                            <input type="radio" class="color-radio" id="color3-radio" name="color-radio" />
                            <label class="color-label" id="color3-label" for="color3-radio"></label>
                        </div>
                        <div class="preferences-radio-container color-container">
                            <input type="radio" class="color-radio" id="color4-radio" name="color-radio" />
                            <label class="color-label" id="color4-label" for="color4-radio"></label>
                        </div>
                        <div class="preferences-radio-container color-container">
                            <input type="radio" class="color-radio" id="color5-radio" name="color-radio" />
                            <label class="color-label" id="color5-label" for="color5-radio"></label>
                        </div>
                    </span>
                </li>
            </ul>
            <ul class="preferences-list" id="preferences-others"></ul>
        </div>
    </main>
</body>