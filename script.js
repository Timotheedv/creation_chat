//confirmation du mot de passe
//Verifions si mdp et confirmation sont pareils

var mdp1 = document.querySelector('.mdp1');
var mdp2 = document.querySelector('.mdp2');
mdp2.onkeyup = function(){
    //Evenement lorsque l'on écrit dans le champs = vérification du mot de passe
     message_error = document.querySelector('.message_error');
     if (mdp1.value != mdp2.value){
        message_error.innerText = "Les mots de passes ne sont pas conformes";
}else {
    message_error.innerText=""
}

}
