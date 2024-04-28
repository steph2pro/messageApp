
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center">
      <h1>liste des news!</h1>
      <?php
      // Inclure les fichiers des classes
    require_once './models/Database.php';
    require_once './models/NewsManager.php';
    require_once './models/News.php';

    // Instancier la classe Database
    $database = new Database();
    $connection = $database->getConnection();

    // Instancier la classe NewsManager avec la connexion à la base de données
    $newsManager = new NewsManager($connection);
    // Appeler la méthode readAllnews du NewsManager pour afficher tous les news
    $listNews = $newsManager->readAllnews();
    // Vérifier si la liste des news n'est pas vide
    if (!empty($listNews)) {
        // Afficher les éléments dans un tableau
        ?>
            <table class="table table-striped">
        <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">titre</th>
                <th scope="col">auteur</th>
                <th scope="col">contenue</th>
                <th scope="col">date ajout</th>
                <th scope="col">date modif</th>
                <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $count=0;
        foreach ($listNews as $new) {
            $count++;
            ?>
            <tr>
            <th scope="row"><?= $count ?></th>
            <td><?= $new['titre'] ?></td>
            <td><?= $new['auteur'] ?></td>
            <td> <?= afficherContenuNews($new['contenu'],50); ?></td>
            <td><?= $new['dateAjout'] ?></td>
            <td><?= $new['dateModif'] ?></td>
            <td>
                
                <a href="?p=update&id=<?= $new['id'] ?>" class="btn btn-success">
                <i class="bi bi-pencil-square"></i>
                </a>  
                <a href="../controllers/newsController.php?action=delete&id=<?= $new['id'] ?>" class="btn btn-danger">
                <i class="bi bi-trash"></i>
                </a>
            
            </td>
            </tr>

            <?php

        }
    } else {
        echo "Aucun new trouvé.";
    }
    ?>
      
            
        
        </tbody>
      </table>
    </div>
</div>