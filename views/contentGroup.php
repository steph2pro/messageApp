<?php
// Inclure les fichiers des classes
require_once 'C:\xampp\htdocs\messageApp\controllers\services.php';
require_once 'C:\xampp\htdocs\messageApp\models\Message.php';
require_once 'C:\xampp\htdocs\messageApp\controllers\messageController.php';


$id = $_GET['id'];
$group = $groupBD->readGroup($id);
$createur=$_SESSION["user"]["id"];
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
      <h4><?= $group['name'] ?><br><span>actif</span><span> <?php if ($createur==$group["createur"]){ echo "(admin)"; } ?> </span></h4>
   </div>
   <ul class="nav_icons">

      <li><img src="./assets/svg/search-outline.svg" alt="" width="27" height="27"></li>
      <?php 
      if ($createur==$group["createur"]) {
        
      
      ?>
      <a href="?p=listUserGroup&id=<?= $group['id'] ?>" style="text-decoration: none;">
         <li>
            <img src="./assets/svg/people-sharp.svg" alt="" width="27" height="27" >
         </li>
      </a>
      <a href="?p=addUserGroup&id=<?= $group['id'] ?>" style="text-decoration: none;">
         <li>
            <img src="./assets/svg/person-add-sharp.svg" alt="" width="27" height="27" >
         </li>
      </a>
      <?php } ?>
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
   <img src="./assets/svg/happy-outline.svg" alt="" width="27" height="27" >
   <img src="./assets/svg/attach-sharp.svg" alt="" width="27" height="27" >
      <input type="text" placeholder="Votre message..." name="content">
      <button type="submit" name="send">
         <img src="./assets/svg/send-outline.svg" alt="" width="27" height="27" >
      </button>
   </div>
</form>