
<div class="container-fluid">
 
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center">
    
      <h1>voici vos news!</h1>
      <form method="post" action="./controllers/newsController.php?action=create">
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
    $listNews = $newsManager->readLimitedNews();
    // Vérifier si la liste des news n'est pas vide

    foreach ($listNews as $new) {
    ?>
<div class="card">
    <div class="card-header">
    <?= $new['auteur'] ?>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            <a href="?p=view&id=<?= $new['id'] ?>" style="text-decoration: none;" > <?= $new['titre'] ?>
                </a>   </h5>
        <p class="card-text">
       <?= afficherContenuNews($new['contenu'],200); ?>
        </p>
        <a href="#" class="btn btn-primary">voir la suite</a>
  </div>
</div>

<?php

}
?>

    
    </form>
      
    </div>
  </div>
    

    </div>
