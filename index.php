<?php 
//demarrage session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if(isset($_POST['button_con'])){
        echo "Vous avez envoyé le formulaire";
        //se connecter à la base de donnée
        include "connexion_bdd.php";
        //extraire les infos du formulaire
        extract($_POST);
        //verifier si les champs sont vides
        if(isset($email) && isset($mdp1) && $email != "" && $mdp1 !=""){
           // Verifier si les identifiants sont justes
            $req = mysqli_query(mysql: $con, query: "SELECT * FROM utilisateurs WHERE email = '$email' AND mdp = '$mdp1'");
            if(mysqli_num_rows(result: $req) > 0){
                //si les id sont justes
                //Création d'une session
                $_SESSION['user'] = $email;
                //redirection vers la page chat
                header("location:chat.php");
                //detruire la variable du message d'inscription
                unset($_SESSION['message']);
                
            }else {
                //si non
                $error = "Email ou mots de passe incorrecte(s) !";
            }
        }else {
            $error = "Veillez remplir tous les champs !";
        }
        
    }
    ?>
    <form action="" method="POST" class="form_connexion_inscription">
        <h1>CONNEXION</h1>
        <?php 
            //afficher message de creation de compte
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
            }
            ?>
        <p class="message_error">
            <?php 
            //afficher l'erreur
            if(isset($error)){
                echo $error;
            }
            ?>
        </p>
        <label>Adresse e-mail</label>
        <input type="email" name="email">
        <label>Mot de Passe</label>
        <input type="password" name="mdp1">
        <input type="submit" value="Connexion" name="button_con">
        <p class="link">Vous n'avez pas de compte ? <a href="inscription.php">Créer un compte</a></p>
    </form>
</body>
</html>

