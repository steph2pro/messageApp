<?php
$userId=$_SESSION['user']["id"];
$listgroups = $userBD->getUserGroups($userId);
// Vérifier si la liste des groups n'est pas vide
if (!empty($listgroups)) {
    // Afficher les éléments dans un tableau
   
    echo "<h5 style='text-align:center;color: dodgerblue;'>vos groupes de discution</h5>";
    foreach ($listgroups as $group) {
        
        ?>
            
            <a href="?p=contentGroup&id=<?= $group['id'] ?>"  style="text-decoration: none;">
            
            <div class="block <?php if (isset($_GET['id']) && $_GET['id']== $group['id']) {echo "active";} ?>">
                    <div class="imgbx">
                        <img src="./assets/profiles/<?= $group["profil"] ?>" alt="" class="cover">
                    </div>
                    <div class="details">
                        <div class="listHead">
                            <h4><?= $group["name"] ?></h4>
                            <p class="time"> 12:09</p>
                        </div>
                        <div class="message_p">
                            <p> voici le dernier message</p>
                        </div>
                    </div>
            </div>



            </a> 
        
        <?php

    }
} else {
    echo "Vous n'avez aucun group.";
}
?>
<!-- 
                <div class="block nonlue">
                    <div class="imgbx">
                        <img src="user.png" alt="" class="cover">
                    </div>
                    <div class="details">
                        <div class="listHead">
                            <h4>steph Teams 2</h4>
                            <p class="time"> 13:09</p>
                        </div>
                        <div class="message_p">
                            <p> voici le dernier message 222222222222222</p>
                            <b>3</b>
                        </div>
                    </div>
                </div> -->