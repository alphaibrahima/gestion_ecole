<?php
    $server_name = "localhost";
    $user        = "root";
    $pass_word   = "";
    $dbname      = "gestion_ecole";

   try{
    $db = new PDO("mysql:host=$server_name; dbname=$dbname",$user,$pass_word);
    // afficher les erreur
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // $db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   }catch(PDOExcetion $e){
       die("Echec connection ".$e->getMessage());
   }
?>