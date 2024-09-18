<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>faiz@gmail.com | chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="chat">
        <div class="button_email">
            <span>faiz@mail.com</span>
            <a href="" class="Deconnexion_btn">Déconnexion</a>
        </div>
        <!--messages-->
        <div class="messages_box">
            <div class="message your_message">
                <span>Vous</span>
                <p>Commen ça va?</p>
                <p class="date">26-12-01 00:25:26</p>
            </div>
            <div class="message others_message">
                <span>azerty@gmail.com</span>
                <p>Oui ça va merci</p>
                <p class="date">26-12-01 00:25:26</p>

            </div>           
        </div>
        <!--Fin messages-->
        <form action="" class="send_message" method="post">
            <textarea name="message" cols="30" rows="2" placeholder="Votre message"></textarea>
            <input type="submit" value="Envoyé" name="Send">
        </form>
    </div>
</body>
</html>