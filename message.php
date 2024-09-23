<?php
session_start();
if (isset($_SESSION['user'])) { //si l'utilisateur s'est connecté
    //connexion à la base de donnée
    include "connexion_bdd.php";
    //requête pour afficher les messages
    $req = mysqli_query($con, "SELECT * FROM messages ORDER BY id_m DESC");
    if (mysqli_num_rows($req) == 0) {
        //s'il n'y a pas de messages
        echo "Messagerie vide";
    } else {
        //si oui 
        while ($row = mysqli_fetch_assoc($req)) {
            //si c'est moi qui est envoyé le message on utilise ce format
            if($row['email'] == $_SESSION['user']) {
                ?>
                <div class="message your_message">
                    <span>Vous</span>
                    <p><?=$row['msg']?></p>
                    <p class="date"><?= $row['date'] ?></p>
                </div>
                <?php

            } else {
                //si je ne suis pas l'auteur de cemessage, je l'affiche sous ce format:
                ?>
                <div class="message others_message">
                    <span><?=$row['email']?></span>
                    <p><?=$row['msg'] ?></p>
                    <p class="date"><?=$row['date']?></p>

                </div>
            <?php

            }
        }
    }

}



?>









<div class="message others_message">
    <span>azerty@gmail.com</span>
    <p>Oui ça va merci</p>
    <p class="date">26-12-01 00:25:26</p>

</div>