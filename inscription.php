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
if(isset($_POST['button_inscription'])){
    include "connexion_bdd.php";
    //extraire les infos du formulaire
    extract($_POST);
    //verifier si les champs sont vides
    if(isset($email) && isset($mdp1) && $email != "" && $mdp1 !="" && isset($mdp2) && $mdp2 !=""){
        //verifier si les mdp sont conformes
        if($mdp2 != $mdp1){
            $error = 'Les mots de passes sont différents';
        }else{
            $req = mysqli_query($con, "SELECT * FROM utilisateurs WHERE email = '$email'");
            if (mysqli_num_rows($req) == 0){
                //si ça n'existe pas creonns le compte 
                $req = mysqli_query($con, "INSERT INTO utilisateurs VALUES (NULL, '$email', '$mdp1')");
                if($req){
                    //si non
                    $_SESSION['message'] = "<p class = 'message_inscription'>Votre compte a été crée avec succès! </p>";
                    //redirection vers connexion
                    header("location:index.php");
                }else{
                    $error = "incription échouée";
                }
            }else{
                //si email existe déja
                $error = "Cet email existe déjà !";
            }
        }
}else{
    $error = "Veillez remplir tous les champs !";
}
};

?>
    <form action="" method = "POST" class="form_connexion_inscription">
        <h1>INSCRIPTION</h1>
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
        <input type="password" name="mdp1" class="mdp1">
        <label>Confirmation du mot de passe</label>
        <input type="password" name="mdp2" class="mdp2">
        <input type="submit" value="Inscription" name = "button_inscription">
        <p class="link">Vous avez un compte ? <a href="index.php">Se connecter</a></p>
    </form>

    <script src="script.js"></script>
</body>
</html>

