
<?php
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
  // Vérifier si la liste des news n'est pas vide
$userId=$_SESSION['user']["id"];
    
?>
<!-- entete -->
<div class="header">
                <div class="imgText">
                  
                    <h4>la liste detaille de vos news qui on ete suprimer</span></h4>
                </div>
                <ul class="nav_icons">
                    
                    <li><ion-icon name="search-outline"></ion-icon></li>
                    <a href="?p=addNews"  style="text-decoration: none;">
                    <li><ion-icon name="add-sharp"></ion-icon></li>
                    </a>
                    <a href="?p=restore" style="text-decoration: none;">
                    <li><ion-icon name="camera-reverse"></ion-icon></li>

                    </a>
                </ul>
 </div>
            <!-- cadre de discution -->
             <div class="chatBox">
              <?php  
                
                $xml = simplexml_load_file('./models/news_backup.xml');  
              
              foreach ($xml->news as $news) {
                ?>
              <div class="card text-center" style="margin-top: 25px;">
                <div class="card-header">
                <?= $news->auteur ?>
                </div>
                <div class="card-body">
                  <h5 class="card-title">
                  <?= $news->titre ?>
                  </h5>
                  <p class="card-text"><?= afficherContenuNews($news->contenu,200); ?></p>
                  <a href="./controllers/newsController.php?action=restore&id=<?= $news->id ?>" class="btn btn-warning">restauter</a>
                </div>
                <div class="card-footer text-muted">
                <div class="row align-items-center" style="font-size: 0.8em;">
                  <div class="col">
                     creation : <?= $news->dateAjout ?>
                  </div>
                  <div class="col">
                    
                  </div>
                  <div class="col">
                     modification : <?= $news->dateModif ?>
                  </div>
                </div>
                </div>
              </div>


            <?php
            
            }
            ?>
            </div>
             
             </div>
             <!-- envoie de message 
             <div class="chatbox_input">
                <ion-icon name="happy-outline"></ion-icon>
                <ion-icon name="attach-sharp"></ion-icon>
                <input type="text" placeholder="messages">
                <button type="submit"><ion-icon name="send-outline"></ion-icon></button>
             </div>
            -->
