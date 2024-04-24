<?php
    $title = "Todo List - Projet NSI";
    include_once("../includes/head.php");
?>
<html>

<body>
    <main>
        <section class="frame" id="frame1">
            <h1 id="home-title">Todo List</h1>
            <ul id="home-slogan">
                <li class="home-slogan-element">Votre journée,</li>
                <li class="home-slogan-element">vos règles,</li>
                <li class="home-slogan-element">notre liste.</li>
            </ul>
            <!-- <div id="auth-btn-container"> -->
                <!-- <a class="auth-btn" id="register-btn" href="../pages/register.php">Créer un compte</a> -->
                <a id="login-btn" href="../pages/login.php">
                    <p>Se connecter</p>
                </a>
            <!-- </div> -->
            <!-- <a href="#frame2" id="frame1-scroller"> -->
            <div id="frame1-scroller">
                <div>
                    <!-- <svg widht="30" height="30" xmlns="http://www.w3.org/2000/svg"> -->
                        <!-- <polygon points="17.5,35 33,20 23,20 23,0 12,0 12,20 2,20" style="fill: #FFF;" /> -->
                        <!-- <polygon points="0,0 30,0 30,30 0,30" /> -->
                    <!-- </svg> -->
                    <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg">
                        <!-- <polygon points="0,0 0,30 30,30 30,0" /> -->
                        <path d="M 13 2 a 2 2 0 0 1 4 0 l 0 20 l 9.4 -9.4 a 2 2 0 0 1 3.2 3.2 l -14.6 14.6 l -14.6 -14.6 a 2 2 0 0 1 3.2 -3.2 l 9.4 9.4 Z" fill="#FFF" /> <!-- SVG fait maison :) -->
                    </svg>
                </div>
            </div>
        </section>
        <div class="frame-separator" id="frame-separator1"></div>
        <section id="scrolling-frame">
            <div id="scrolling-sticky-container">
                <h2 id="scrolling-frame-title">Une interface simple et intuitive</h2>
                <ul id="scrolling-container">
                    <li class="scrolling-card active" id="card0">Marquez vos tâches comme achevées en un clic !</li>
                    <li class="scrolling-card" id="card1">Accédez facilement  à vos tâches en cours, grâce au groupement par catégories !</li>
                    <li class="scrolling-card" id="card2">Définissez des tâches complètes et détaillées en leur ajoutant une description !</li>
                    <li class="scrolling-card" id="card3">Modifiez et supprimez efficacement vos tâches obsolètes !</li>
                </ul>
                <ul id="scrolling-statuts-container">
                    <li class="scrolling-statuts active" id="card0-statut">
                    <li class="scrolling-statuts" id="card1-statut">
                    <li class="scrolling-statuts" id="card2-statut">
                    <li class="scrolling-statuts" id="card3-statut">
                    <!-- <li class="scrolling-controller active"></li>
                    <li class="scrolling-controller"></li>
                    <li class="scrolling-controller"></li>
                    <li class="scrolling-controller"></li> -->
                </ul>
            </div>
            <div class="scroll-stop" id="scroll-stop1"></div>
            <div class="scroll-stop" id="scroll-stop2"></div>
            <div class="scroll-stop" id="scroll-stop3"></div>
            <div class="scroll-stop" id="scroll-stop4"></div>
        </section>
        <div class="frame-separator" id="frame-separator2"></div>
        <section class="frame" id="frame3">
            <div id="frame3-sticky-container">
                <div id="frame3-sticky-layer1">
                    <h2 id="frame3-title">Laissez s'exprimer<br />votre <span id="frame3-title-special">créativité</span></h2>
                    <div id="mouse-icon">
                        <svg width="19" height="30" viewBox="0 0 19 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.875 20.625V9.375C16.875 7.38588 16.0848 5.47822 14.6783 4.0717C13.2718 2.66518 11.3641 1.875 9.375 1.875C7.38588 1.875 5.47822 2.66518 4.0717 4.0717C2.66518 5.47822 1.875 7.38588 1.875 9.375V20.625C1.875 22.6141 2.66518 24.5218 4.0717 25.9283C5.47822 27.3348 7.38588 28.125 9.375 28.125C11.3641 28.125 13.2718 27.3348 14.6783 25.9283C16.0848 24.5218 16.875 22.6141 16.875 20.625ZM9.375 0C6.8886 0 4.50403 0.98772 2.74587 2.74587C0.98772 4.50403 0 6.8886 0 9.375V20.625C0 23.1114 0.98772 25.496 2.74587 27.2541C4.50403 29.0123 6.8886 30 9.375 30C11.8614 30 14.246 29.0123 16.0041 27.2541C17.7623 25.496 18.75 23.1114 18.75 20.625V9.375C18.75 6.8886 17.7623 4.50403 16.0041 2.74587C14.246 0.98772 11.8614 0 9.375 0Z" fill="white"></path>
                            <path d="M10.0379 7.39959C9.8621 7.22377 9.62364 7.125 9.375 7.125C9.12636 7.125 8.8879 7.22377 8.71209 7.39959C8.53627 7.5754 8.4375 7.81386 8.4375 8.0625V11.8125C8.4375 12.0611 8.53627 12.2996 8.71209 12.4754C8.8879 12.6512 9.12636 12.75 9.375 12.75C9.62364 12.75 9.8621 12.6512 10.0379 12.4754C10.2137 12.2996 10.3125 12.0611 10.3125 11.8125V8.0625C10.3125 7.81386 10.2137 7.5754 10.0379 7.39959Z" fill="white" id="mouse-icon-cursor"></path>
                        </svg>
                    </div>
                    <div id="frame3-color-container">
                        <div id="frame3-colors-bg">
                            <h3 id="frame3-color-txt">Choisissez un thème parmis notre sélection de couleurs personnalisées :</h3>
                            <ul id="frame3-color-list">
                                <li class="frame3-color"></li>
                                <li class="frame3-color"></li>
                                <li class="frame3-color"></li>
                                <li class="frame3-color"></li>
                                <li class="frame3-color"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="frame3-sticky-layer2">
                    <a id="register-container" href="../pages/register.php">
                        <div id="register-content">
                            <h2 id="register-label">Créer un compte</h2>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>
</body>

</html>

<!-- 

https://skai.io/

Frame 1 : présentation globale, doit donner envie
Autres frames : toutes similaires, exposent chacune un aspect du site

Arguments : simple d'utilisation (interface minimaliste / épurée), couleurs customizables parmi une sélection sur-mesure (plusieurs images avec différentes couleurs), dark-mode / light-mode, présentation système de tri des taches, titres et descriptions de tâches de n'importe quelle taille grace au title sur le hover, définissez rapidement le statuts de vos tâches directement depuis votre liste, toutes les fonctionnalités accessibles depuis une même page

Frame 1 :

- Gros titre : Todo List (chaque lettre apparait progressivement avec transition opacité en mode stylayyyyy)
- Sous-titre (slogan) : Gérez votre quotidien avec aisance
- Sous-titre (apparaissent chacun en décalé, suite du slogan) : Votre journée, vos règles, notre liste. ("notre liste" différent, souligné d'une certaine couleur peut-être ?)
- Bouton Créer un compte ?

=> Bouton pour descendre : monte et descend toutes le 3s par exemple

Animation Titres : Première ligne rotate de bas en haut + opacité, puis same 2ème ligne
Sous-titres apparaissent avant titres => titre slide de gauche à droite comme en sortant de derrière un mur

Traits entre les frames représentent la délimitation de 100vh, à retirer dans le projet

Frame 2 - 3 - 4 - 5 :

- Titre : Une interface simple et intuitive

- Accédez facilement à vos tâches en cours, grace au groupement par catégories !

- Marquez vos tâches comme achevées en un clic !

- Définissez des tâches complètes et détaillées en leur ajoutant une description !
- Sous-titre : Qu'importe la taille, les descriptions sont visibles en survolant une tâche.

- Modifiez et supprimez rapidement vos tâches obsolètes !

=> On scroll : Défilement des infos + onclick sur les boutons en bas

(regrouper frames 6 et 7, aspect personnalisable ?)

Frame 6 et 7 :

=> Frame d'intro : particules colorées autour de créativité ? Ou uniquement au load et au hover ?

Frame 6 :

=> On oublie à mon avis
- Pour une expérience plus immersive, passez en mode sombre depuis le menu préférences !
=> Option pour passer en dark mode / light mode sur la page d'accueil ?

Frame 7 :

- Ajoutez une touche personnelle à votre expérience de navigation en choisissant un thème parmi notre sélection de couleurs personnalisées.

=> Liste de couleurs, personnalisent la page d'accueil => transition ? 
=> Liste de couleurs : 4 couleurs, n'inclut pas celle en cours

--- Section Projet ---

Frame 1 :

- Statistiques (nombre de lignes de code en PHP / HTML, en CSS et en JS (les 3 alignés en display: flex; justify-content: space-around;, couleur bleu-clair ?))

Puis explications du projet
 -->