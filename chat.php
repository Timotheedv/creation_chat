<?php 
session_start();
if(!isset($_SESSION['user'])){
    //si l'utilisateur n 'est pas connecté
    //redirection vers la page de connexion
    header("location:index.php");

}
$user = $_SESSION['user']; //email de l'utilisateur
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?=$user?> | chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="chat">
        <div class="button_email">
            <span><?=$user?></span>
            <a href="deconnexion.php" class="Deconnexion_btn">Déconnexion</a>
        </div>
        <!--messages-->
        <div class="messages_box">Chargement ...</div>        
        
        <!--Fin messages-->

        <?php 
                //envoi de smessages
    if(isset($_POST['send'])){
        //recuperons le message
        $message = $_POST['message'];
       //connexion à la base de données
       include("connexion_bdd.php");
       //verifions si le champ n'est pas vide
       if(isset($message) && $message != ""){
        //insérer le message dans la base de données
        $req = mysqli_query($con, "INSERT INTO messages VALUES (NULL, '$user', '$message', NOW())");

        //on actualise la page
        header('location:chat.php');
       }else {
        //si le message est vide, onactualise la page
        header('location:chat.php');
       }

    }
        ?>
        <form action="" class="send_message" method="post">
            <textarea name="message" cols="30" rows="2" placeholder="Votre message"></textarea>
            <input type="submit" value="Envoyé" name="send">
        </form>
    </div>
    <script>
        //On actualise automatiquement le chat avec AJAX
        var message_box = document.querySelector('.messages_box');
        setInterval(function(){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange =function(){
                if(this.readyState == 4 && this.status == 200){
                    message_box.innerHTML = this.responseText
                }
            };
            xhttp.open("GET","messages.php" , true); //recuperation de la page message
            xhttp.send()
        },500)//Actualiser le chat tous les 500 ms
    </script>
</body>
</html>