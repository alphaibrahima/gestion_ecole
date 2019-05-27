<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" text="css" href="css/style.css">
    <title>AFFICHE</title>
</head>
<body>
<?php
    if(isset($_GET['show']))
    {
        $id = $_GET['show'];
        //echo $id;
        $query = "SELECT classes.id as classeid, classes.nom_de_classe, classes.niveau, eleves.id, eleves.nom,eleves.prenom,eleves.adresse,eleves.tel,eleves.dateNaissance,eleves.dateInscription FROM classes INNER JOIN eleves ON classes.id = eleves.id_classe where eleves.id =$id";
        include('db.php');
        $req = $db->prepare($query);
        $req->execute(array());
        $data = $req->fetchAll();
        foreach($data as $ligne)
        {
            echo "<br><br><br><br><div class='container'><div class='d-flex justify-content-center bg-light py-5 '>"."<i class='fas fa-award '></i><br> L'eleve S'appel ".$ligne['nom']." ".$ligne['prenom']." <br/>Et Il (Elle) habitte A(u) ".$ligne['adresse']."<br/> Son numero De Telephone ".$ligne['tel']."<br/> Et Il (Elle) Est Né(e) En".$ligne['dateNaissance']."<br/> Et Il (Elle) Est Inscrit(e) Le ".$ligne['dateInscription']."<br/> il (Elle) Est En Classe ".$ligne['niveau']."<br/> Plus precissement En ".$ligne['nom_de_classe']."</div></div>";
        }
    }
?>
    <br>
    <div class="container">
        <a href="index.php" class="btn btn-block btn-info">Accueil</a>
    </div>
    
<script src="JS/jquery-3.3.1.min.js"></script>
<script src="JS/popper.min.js"></script>
<script src="JS/bootstrap.min.js"></script>
</body>
</html>