
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
$userId=$_SESSION['user']["id"];
    
?>
<!-- entete -->
<div class="header">
                <div class="imgText">
                  
                    <h4><?= $news['titre'] ?><br><span>ecrit par <b><?= $news['auteur'] ?></b></span></h4>
                </div>
                <ul class="nav_icons">
                    
                    <li><ion-icon name="search-outline"></ion-icon></li>
                    <a href="?p=addNews"  style="text-decoration: none;">
                    <li><ion-icon name="add-sharp"></ion-icon></li>

                    </a>
                </ul>
 </div>
            <!-- cadre de discution -->
             <div class="chatBox">
                <p style="word-wrap: break-word;">
                <?= $news['contenu'] ?>
                </p>
                
             <div class="" >
                
                    
                    
                </div>
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
