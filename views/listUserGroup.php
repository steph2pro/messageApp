<?php
      // Inclure les fichiers des classes
    require_once 'services.php';
    $id = $_GET['id'];
    $group = $groupBD->readGroup($id);
    // Vérifier si la liste des news n'est pas vide
?>
<section style="position:absolute; width:100%" class="section">
	
<form class="box" style="width: 30%;" action="./controllers/groupController.php?id=<?= $id ?>&action=addUuserGroup"  enctype="multipart/form-data" method="post" name="login">
<a href="./index.php" ><img src="./assets/svg/close-sharp.svg" alt="" width="27" height="27" style="margin-left: 25%;position:absolute;font-size:1.5em"></a>
                <div class="imgText">
                    <div class="userimg">
                        <img src="./assets/profiles/<?= $group['profil'] ?>" class="cover" alt="">
                    </div>
                    <h4><?= $group['name'] ?></h4>
                   
                </div>
                
	<h1 class="box-title" style="margin-top: 25px;">liste des membres du groupe</h1>

 <div class="chatlist">
 <?php 
 $listusers = $groupBD->readAllUsersByGroup($id);
//  var_dump($listusers);
//  die;
if (!empty($listusers)) {
    // Afficher les éléments dans un tableau
   
    
    foreach ($listusers as $user) {
        
        ?>
            
            <a href="?p=contentuser&id=<?= $user['id'] ?>"  style="text-decoration: none;">
            
            <div class="block active">
                    <div class="imgbx">
                        <img src="./assets/profiles/<?= $user["profil"] ?>" alt="" class="cover">
                    </div>
                    <div class="details">
                        <div class="listHead">
                            <h4><?= $user["username"] ?></h4>
                            
                        </div>
                        <div style="left: 250px;top:5px; position:absolute;font-size:1.5em">
                            <a href="./controllers/groupController.php?action=delete&id=<?= $user["id"] ?>&idGroup=<?= $id ?>">
                            <img src="./assets/svg/trash-outline.svg" alt="" width="27" height="27">
                            </a>
                        </div>
                    </div>
            </div>



            </a> 
        
        <?php

    }
} else {
    echo "Vous n'avez aucun user.";
}
?>

 </div>
</form>


</section>

