<?php
// Inclure les fichiers des classes
require_once 'C:\xampp\htdocs\messageApp\controllers\services.php';
require_once 'C:\xampp\htdocs\messageApp\models\Message.php';
require_once 'C:\xampp\htdocs\messageApp\controllers\messageController.php';


$id = $_GET['id'];
$group = $groupBD->readGroup($id);

$message_id = $_SESSION["user"]["id"];
$message = $messageDB->readMessage($message_id);
$messages = $messageDB->readGroupMessages($id);
// Vérifier si la liste des news n'est pas vide
?>
<!-- entete -->
<div class="header">
   <div class="imgText">
      <div class="userimg">
         <img src="./assets/profiles/<?= $group['profil'] ?>" class="cover" alt="">
      </div>
      <h4><?= $group['name'] ?><br><span>actif</span></h4>
   </div>
   <ul class="nav_icons">

      <li><ion-icon name="search-outline"></ion-icon></li>
      <a href="?p=listUserGroup&id=<?= $group['id'] ?>" style="text-decoration: none;">
         <li><ion-icon name="people-sharp"></ion-icon></li>
      </a>
      <a href="?p=addUserGroup&id=<?= $group['id'] ?>" style="text-decoration: none;">
         <li><ion-icon name="person-add-sharp"></ion-icon></li>
      </a>
   </ul>
</div>

<!-- cadre de discution -->
<div class="chatBox">

   <?php
   $date_add = $groupBD->getUserGroupDate($_SESSION["user"]["id"], $id);
   ?>
   <!--?php
// echo '<pre>';
//         var_dump($_SESSION);
//         echo '</pre>';
?-->

   <?php foreach ($messages as $message) {
      $cpdate = $messageDB->compareDates($message["time"], $date_add);
      if ($cpdate == 1 || $cpdate == 0) {


   ?>
         <div class="message <?= ($message['sender'] === $_SESSION['user']['id']) ? 'my_message' : 'other_message' ?>">
            <p>
               <?= $message["content"] ?> <br>
               <span><?= substr($message["time"], 11, 5) ?></span>
            </p>
         </div>
   <?php }
   } ?>
   <!-- 
   <div class="message my_message">
            <p>
                <?= $message["content"] ?> <br>
                <span><?= substr($message["time"], 0, 5) ?></span>
            </p>
   </div> -->

</div>


<!-- envoie de message -->
<form method="POST">
   <div class="chatbox_input">
      <ion-icon name="happy-outline"></ion-icon>
      <ion-icon name="attach-sharp"></ion-icon>
      <input type="text" placeholder="Votre message..." name="content">
      <button type="submit" name="send"><ion-icon name="send-outline"></ion-icon></button>
   </div>
</form>