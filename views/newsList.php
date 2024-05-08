
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

$userId=$_SESSION['user']["id"];

// Vérifier si la liste des news n'est pas vide
if (!empty($listNews)) {
    // Afficher les éléments dans un tableau
   
    echo "<h5 style='text-align:center;color: dodgerblue;'>vos news</h5>";
    foreach ($listNews as $news) {
        
        ?>
            
            <a href="?p=contentnews&id=<?= $news['id'] ?>"  style="text-decoration: none;">
            
            <div class="block nonlue <?php if (isset($_GET['id']) && $_GET['id']== $news['id']) {echo "active";} ?>">
                    
                    <div class="details">
                        <div class="listHead">
                            <h4><?= $news["titre"] ?><br> par <?= $news['auteur'] ?></h4>
                            <p class="time"><?= $news['dateAjout'] ?></p>
                        </div>
                        <div class="message_p">
                            <p>  <?= afficherContenuNews($news['contenu'],30); ?></p>
                        </div>
                    </div>
            </div>



            </a> 
        
        <?php

    }
} else {
    echo "il y'a encore aucun news.";
}
?>