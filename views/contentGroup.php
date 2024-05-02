
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
                    <li><ion-icon name="add-sharp"></ion-icon></li>
                </ul>
            </div>
            <!-- cadre de discution -->
             <div class="chatBox">
                 <div class="message my_message">
                    <p>Hi <br><span>13:50</span></p>
                 </div> 
                 <div class="message other_message">
                    <p>Hello <br><span>13:52</span></p>
                 </div> 
                 <div class="message my_message">
                    <p>Hi <br><span>13:50</span></p>
                 </div> 
                 <div class="message other_message">
                    <p>Hello <br><span>13:52</span></p>
                 </div> 
                 <div class="message my_message">
                    <p>Hi <br><span>13:50</span></p>
                 </div> 
                 <div class="message other_message">
                    <p>Hello <br><span>13:52</span></p>
                 </div> 
             </div>
             <!-- envoie de message -->
             <div class="chatbox_input">
                <ion-icon name="happy-outline"></ion-icon>
                <ion-icon name="attach-sharp"></ion-icon>
                <input type="text" placeholder="messages">
                <button type="submit"><ion-icon name="send-outline"></ion-icon></button>
             </div>