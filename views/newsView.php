
<?php
      // Inclure les fichiers des classes
    require_once './models/Database.php';
    require_once './models/NewsManager.php';
    require_once './models/News.php';
    $id = $_GET['id'];
    // Instancier la classe Database
    $database = new Database();
    $connection = $database->getConnection();

    // Instancier la classe NewsManager avec la connexion à la base de données
    $newsManager = new NewsManager($connection);
    // Appeler la méthode readAllnews du NewsManager pour afficher tous les news
    $news = $newsManager->read($id);
    // Vérifier si la liste des news n'est pas vide
?>
<div class="card text-center">
  <div class="card-header">
  <?= $news['auteur'] ?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $news['titre'] ?></h5>
    <p class="card-text"><?= $news['contenu'] ?></p>
    
  </div>
  <div class="card-footer text-muted">
  <div class="row align-items-center">
    <div class="col">
      date de creation : <?= $news['dateAjout'] ?>
    </div>
    <div class="col">
      
    </div>
    <div class="col">
      date de derniere modification : <?= $news['dateModif'] ?>
    </div>
  </div>
  </div>
</div>