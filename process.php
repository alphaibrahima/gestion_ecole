<?php
    
    include("db.php");
    if(isset($_GET['valider']))
    {
       $nom = $_GET['nom'];
       $prenom = $_GET['prenom'];
       $tel = $_GET['tel'];
       $dateNaissance = $_GET['dateNaissance'];
       $adresse = $_GET['adresses'];
       $id_classe = $_GET['id_classe'];
       $query = "INSERT INTO eleves (nom,prenom,adresse,tel,dateNaissance,id_classe) values('$nom','$prenom','$adresse','$tel','$dateNaissance','$id_classe')";
       global $db;
       $req = $db->prepare($query);
       $req -> execute(array());
       HEADER('Location:index.php');
    }
    else{
        echo "jai rien recu";
    }

    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        $query = "delete from eleves where id = $id";
        include("db.php");
        $db->exec($query);
        HEADER('Location:index.php');
    }

    if(isset($_GET['Update']))
    {
        $nom = $_GET['nom'];
        $prenom = $_GET['prenom'];
        $tel = $_GET['tel'];
        $dateNaissance = $_GET['dateNaissance'];
        $adresse = $_GET['adresses'];
        $id = $_GET['id'];
        $id_classe = $_GET['id_classe'];

        $query = "UPDATE eleves set nom='$nom', prenom='$prenom',tel='$tel',adresse='$adresse',id_classe='$id_classe' where id = $id limit 1";
        $db->exec($query);

        HEADER('Location:index.php');
    }

    //INSERTION DE LA TABLE CLASSE

    if(isset($_GET['enregistrer']))
    {
        $nom_de_classe = $_GET['niveau'];
        echo $nom_de_classe;
        $nom_de_classe = $_GET['nom_de_classe'];
        $query = "INSERT INTO classes (nom_de_classe, niveau) values('$nom_de_classe','$nom_de_classe')";
        global $db;
        $req = $db->prepare($query);
        $req -> execute(array());
        HEADER('Location:index.php');
    }
?>