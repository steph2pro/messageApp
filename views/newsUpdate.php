<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
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
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center">
    <a href="./views/newsList.php" class="btn btn-info">voir la liste</a>
      <h1>Modifier une News!</h1>
      <form method="post" action="./controllers/newsController.php?action=update&id=<?= $id ?>">
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Auteur</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" name="auteur" value="<?= $news['auteur'] ?>">
        </div>
    </div>


    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">titre</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword3" name="titre" value="<?= $news['titre'] ?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">contenue</label>
        <div class="col-sm-10">
        <textarea type="text" class="form-control" id="inputPassword3" name="contenu">
        <?= $news['contenu'] ?>
        </textarea>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary"> Modifier</button>
    </form>
      
    </div>
  </div>
    

    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>