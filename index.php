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
            <input type="text" name="nom" id="name" placeholder="Nom Eleve" class="form-control">
            <input type="text" name="prenom" id="prenom" placeholder="Prenom Eleve" class="form-control">
            <div class="row">
                <div class="col">
                    <input type="tel" name="tel" id="tel" placeholder="Telephone" class="form-control m-0">
                </div>
                <div class="col">
                        <input type="text" name="dateNaissance" id="dateNaissance" placeholder="1995-11-16" class="form-control m-0">
                </div>
                <div class="col">
                    <input type="text" name="adresses" id="adresse" placeholder="Adresse" class="form-control m-0">
                </div>
                <div class="col">
                    <input type="text" name="id_classe" id="id_classe" placeholder="L'ID Classe" class="form-control m-0">
                </div>
            </div>

            <!--CREATION DES BOUTTONS inserer modifier suprimer voir-->
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-success"  name="valider" value="Inserer">
        </div>
        </form>
    </div>
    <!-- FORMULAIRE POUR AJOUT DE CLASSE-->
    <div class="d-flex justify-content-center">
        <form action="process.php" method="get" class='w-50'>
        <div class="row">
            <div class="col">
                 <input type="text" name="nom_de_classe" id="nom_de_classe" placeholder="Nom De La Classe : Terminal S2 A" class="form-control m-0 ">
            </div>
            <div class="col">
                <input type="text" name="niveau" id="niveau" placeholder="Ex : Terminal" class="form-control  m-0 ">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-info "  name="enregistrer" value="Enregistrer">
            <a href="#" class="btn btn-danger" name="Read">Voir Classe</a>
        </div>
        </form>
    </div>
    <!-- AFFICHAGE DU TABLEAU -->
    <div class="d-flex justify-content-center ">
    <table class="table w-50">
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>CLASSE</th>
            <th>ACTION</th>
        </tr>
        <?php

            //SELECTION DES DONNEES DANS LA BASE DE DONNEE
            $query = "SELECT classes.id as classeid, classes.nom_de_classe, classes.niveau, eleves.id, eleves.nom,eleves.prenom FROM classes INNER JOIN eleves ON classes.id = eleves.id_classe ";
            include('db.php');
            $req = $db->prepare($query);
            $req->execute(array());
            $etudiant=$req->fetchAll();
            // Affichage des donnee dans la table
            foreach ($etudiant as $ligne) {
                $id = $ligne['id'];
                echo "<tr><td>".$ligne['nom']."</td><td>".$ligne['prenom']."</td><td>".$ligne['classeid']."</td><td><a href='eleveEdit.php?edit=$id' class='text-warning'><i class='fas fa-edit'></i></a>"." "."<a href='process.php?delete=$id' class='text-danger'><i class='fas fa-trash-alt '></i></a>"." "."<a href='showElev.php?show=$id' class='text-primary'><i class='fas fa-eye'></i></a></td></tr>";
                    
            }
            
        ?>
    </table>
    </div>

    <br><br><br>
    


<script src="JS/jquery-3.3.1.min.js"></script>
<script src="JS/popper.min.js"></script>
<script src="JS/bootstrap.min.js"></script>
</body>
</html>