
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
                  
                    <h4>la liste detaille de vos news ainsi que leur<b> auteur </b></span></h4>
                </div>
                <ul class="nav_icons">
                    
                    <li><img src="./assets/svg/search-outline.svg" alt="" width="24" height="24"></li>
                    <a href="?p=addNews"  style="text-decoration: none;">
                    <li><img src="./assets/svg/add-sharp.svg" alt="" width="24" height="24"></li>
                    <a href="?p=restore"  style="text-decoration: none;">
                    <li><img src="./assets/svg/camera-reverse-outline.svg" alt="" width="24" height="24"></li>
                    

                    </a>

                    </a>
                </ul>
 </div>
            <!-- cadre de discution -->
             <div class="chatBox">
              <?php  
              
              foreach ($listNews as $new) {
                ?>
              <div class="card text-center" style="margin-top: 25px;">
                <div class="card-header">
                <?= $new['auteur'] ?>
                </div>
                <div class="card-body">
                  <h5 class="card-title">
                  <a href="?p=contentnews&id=<?= $new['id'] ?>" style="text-decoration: none;" > <?= $new['titre'] ?>
                            </a>
                  </h5>
                  <p class="card-text"><?= afficherContenuNews($new['contenu'],200); ?></p>
                  <a href="?p=contentnews&id=<?= $new['id'] ?>" class="btn btn-primary">voir la suite</a>
                </div>
                <div class="card-footer text-muted">
                <div class="row align-items-center" style="font-size: 0.8em;">
                  <div class="col">
                     creation : <?= $new['dateAjout'] ?>
                  </div>
                  <div class="col">
                    
                  </div>
                  <div class="col">
                     modification : <?= $new['dateModif'] ?>
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
