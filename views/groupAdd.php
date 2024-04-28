
<div class="container-fluid">
 
<?php
      // Inclure les fichiers des services
      require_once './services.php';
    // Appeler la méthode readAllusers pour afficher tous les users
    $listusers = $userBD->readAllUsers();
    // Vérifier si la liste des users n'est pas vide
    if (!empty($listusers)) {
        // Afficher les éléments dans un tableau
        ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center">
 
      <h1>Ajouter un Groupe de discution!</h1>
      <form method="post" action="./controllers/groupController.php?action=create"  enctype="multipart/form-data">
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">nom du groupe</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" name="nom">
        </div>
    </div>
    <div class="row mb-3">
          <label for="utilisateurs" class="col-sm-2 col-form-label">Utilisateurs</label>
          <div class="col-sm-10">
            <select multiple class="form-control" id="utilisateurs" name="utilisateurs[]">
            <?php
        foreach ($listusers as $user) {
            
            ?>
              <option value="<?= $user['id'] ?>"><?= $user['username'] ?> </option>
              <?php
                        }
                } else {
                    echo "Aucun user trouvé.";
                }
               ?>
            </select>
          </div>
        </div>

    
    
    <button type="submit" class="btn btn-primary"> creer</button>
    </form>
      
    </div>
  </div>
    

    </div>



