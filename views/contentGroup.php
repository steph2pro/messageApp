
<?php
      // Inclure les fichiers des classes
    require_once 'services.php';
    $id = $_GET['id'];
    $group = $groupBD->readGroup($id);
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
                    <a href="?p=listUserGroup&id=<?= $group['id'] ?>"  style="text-decoration: none;">
                    <li><ion-icon name="people-sharp"></ion-icon></li>
                    </a>
                    <a href="?p=addUserGroup&id=<?= $group['id'] ?>"  style="text-decoration: none;">
                    <li><ion-icon name="person-add-sharp"></ion-icon></li>
                    </a>
                </ul>
 </div>
            <!-- cadre de discution -->
             <div class="chatBox">
               <?php
               $messages= $messageBD->MessagesofGroup($id);
               if (!empty($listgroups)) {
    // Afficher les éléments dans un tableau
   
    echo "<h5 style='text-align:center;color: dodgerblue;'>vos groupes de discution</h5>";
    foreach ($listgroups as $group) {
    }}
        ?>
                 <div class="message my_message">
                    <p>Hi <br><span>13:50</span></p>
                 </div> 
                 <div class="message my_message">
                    <p>Hi <br><span>13:50</span></p>
                 </div> 
             </div>
             <!-- envoie de message -->
               <form method="post" action="./controllers/messageController.php?action=send&id=<?= $group['id'] ?>">
             <div class="chatbox_input">
                <ion-icon name="happy-outline"></ion-icon>
                <ion-icon name="attach-sharp"></ion-icon>
                <input type="text" placeholder="messages" name="content">
                <button type="submit"><ion-icon name="send-outline"></ion-icon></button>
               
             </div>
            </form>