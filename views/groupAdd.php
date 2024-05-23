
<section style="position:absolute; width:100%" class="section">
	
<form class="box" style="width: 30%;" action="./controllers/groupController.php?action=create"  enctype="multipart/form-data" method="post" name="login">
	<h1 class="box-logo box-title"> message App<a href="./index.php" style="margin-left: 100px;position:absolute"><img src="./assets/svg/close-sharp.svg" alt="" width="27" height="27"></a></h1>
	<h1 class="box-title">creer un groupe</h1>
 <?php 
 $listusers = $userBD->readAllUsers();
 if (!empty($listusers)) {
  // Afficher les éléments dans un tableau
  ?>
<input type="text" class="box-input" name="nom" placeholder="Nom du groupe" required>
<p>photo de profil du groupe</p>
<input type="file" class="box-input" id="inputPassword4" name="profil">
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



<input type="submit" value="enregistrer " name="submit" class="box-button" required>


</form>


</section>

