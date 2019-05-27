<?php

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $query = "select * from eleves where id=$id";
        include("db.php");
        $req = $db->prepare($query);
        $req->execute(array());

        $dataEdit = $req->fetch();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" text="css" href="css/style.css">
    <title>GESTION D'ECOLE</title>
</head>
<body>
    <!--CREATION DU TITRE & CENTRAGE DU TITRE-->
    <div class="container text-center">
        <h1 class="bg-light py-4 text-warning"><i class="fas fa-award"></i> Edacy School <i class="fas fa-award"></i></h1>
    </div>   
    <!--CREATION DU FORMULAIRE ET DU CENTRAGE-->
    <div class="d-flex justify-content-center">
        <form method="get" action="process.php" class="w-50">
            <input type="<?php echo 'hidden'?>" name="id" id="id" value ="<?= $dataEdit['id']?>" class="form-control">
            <input type="text" name="nom" id="name" value ="<?= $dataEdit['nom']?>" class="form-control">
            <input type="text" name="prenom" id="prenom" value ="<?= $dataEdit['prenom']?>" class="form-control">
            <div class="row">
                <div class="col">
                    <input type="tel" name="tel" id="tel" value ="<?= $dataEdit['tel']?>" class="form-control m-0">
                </div>
                <div class="col">
                        <input type="text" name="dateNaissance" id="dateNaissance" value ="<?= $dataEdit['dateNaissance']?>" class="form-control m-0">
                </div>
                <div class="col">
                    <input type="text" name="adresses" id="adresse" value ="<?= $dataEdit['adresse']?>" class="form-control m-0">
                </div>
                <div class="col">
                <!--Pour afficher un liste d'otion pour les classe disponible-->
                    
                    <select name="id_classe" id="id_classe" class="form-control m-0">
                        <?php 
                            //ON SELECTION TOUTES LES LIGNES DE LA TABLE CLASSE POUR LES AFFICHER
                             $query = "select * from classes ";
                             $req = $db->prepare($query);
                             $req->execute(array());
                             $tab = $req->fetchAll();
                            //UNE BOOCLE POUR AFFICHER TOUTES CLASSES DISPO
                            foreach ($tab as $ligne) { 
                               echo "<option>".$ligne['id']."</option>";
                            }?>
                    </select>
                    
                </div>
            </div>

            <!--CREATION DES BOUTTONS inserer modifier suprimer voir-->
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-success"  name="valider" value="Inserer">
            <button class="btn btn-primary" name="Read">Read</button>
            <button class="btn btn-warning" name="Update">Update</button>
        </div>
        </form>
    </div>