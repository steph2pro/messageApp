
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
                    
                    <li><img src="./assets/svg/search-outline.svg" alt="" width="24" height="24"></li>
                    <a href="?p=addNews"  style="text-decoration: none;">
                    <li><img src="./assets/svg/add-sharp.svg" alt="" width="24" height="24"></li>

                    </a>
                </ul>
 </div>
            <!-- cadre de discution -->
             <div class="chatBox">
                <p style="word-wrap: break-word;">
                <?= $news['contenu'] ?>
                </p>
                
             <div class="" style="margin-left:80%;">
                
                <a href="./controllers/newsController.php?action=update&id=<?= $news['id'] ?>" class="btn btn-success">
                <ion-icon name="create"></ion-icon>
                </a>  
                <a href="./controllers/newsController.php?action=delete&id=<?= $news['id'] ?>" class="btn btn-danger">
                <ion-icon name="trash"></ion-icon>
                </a>   
                    
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
