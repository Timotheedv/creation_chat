<?php 
//Connexion à  la base de donnée
$con = mysqli_connect('localhost', 'root', '', 'chat');
//gérer les accents et autres caractères français
$req = mysqli_query(mysql: $con, query: "SET NAMES UTF8");
if(!$con){
    
}

?>