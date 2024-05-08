<?php
      // Inclure les fichiers des classes
    require_once 'services.php';
    $id = $_GET['id'];
    $group = $groupBD->readGroup($id);
    // Vérifier si la liste des news n'est pas vide
?>
<section style="position:absolute; width:100%" class="section">
	
<form class="box" style="width: 30%;" action="./controllers/groupController.php?id=<?= $id ?>&action=addUuserGroup"  enctype="multipart/form-data" method="post" name="login">
<a href="./index.php" style="margin-left: 25%;position:absolute;font-size:1.5em"><ion-icon name="close-sharp"></ion-icon></a>
                <div class="imgText">
                    <div class="userimg">
                        <img src="./assets/profiles/<?= $group['profil'] ?>" class="cover" alt="">
                    </div>
                    <h4><?= $group['name'] ?></h4>
                   
                </div>
                
	<h1 class="box-title" style="margin-top: 25px;">Ajouter des utilisateurs</h1>
 <?php 
 $listusers = $userBD->readAllUsers();
 if (!empty($listusers)) {
  // Afficher les éléments dans un tableau
  ?>
<p>choisi les membres</p>
<div class="row mb-3">
          
          <div class="col-sm-10">
            <select multiple class="form-control" size="2" id="utilisateurs" name="utilisateurs[]" class="box-input" style="border:none; width:110%">
            <?php
        foreach ($listusers as $user) {
            
            ?>
              <option value="<?= $user['id'] ?>">
              <img src="./assets/profiles/<?= $user['profil'] ?>" alt="">
              <?= $user['username'] ?> </option>
              <?php
                        }
                } else {
                    echo "Aucun user trouvé.";
                }
               ?>
            </select>
          </div>
        </div>



<input type="submit" value="Ajouter " name="submit" class="box-button" required>


</form>


</section>

