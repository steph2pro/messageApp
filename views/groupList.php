
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center">
      <h1>liste des groupes!</h1>
      <?php
      // Inclure les fichiers des services
      require_once './services.php';
    // Appeler la méthode readAllgroups pour afficher tous les groups
    $listgroups = $groupBD->readAllGroups();
    // Vérifier si la liste des groups n'est pas vide
    if (!empty($listgroups)) {
        // Afficher les éléments dans un tableau
        ?>
            <table class="table table-striped">
        <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">profile</th>
                <th scope="col">nom</th>
                <th scope="col">nombre de membre</th>
                <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $count=0;
        foreach ($listgroups as $group) {
            $count++;
            ?>
            <tr>
            <th scope="row"><?= $count ?></th>
            <td> 
                <div class="profile-content">
					<img src="assets/images/profile.png" alt="profile" style="height: 52px;
	width: 52px;
	object-fit: cover;
	border-radius: 16px;
	margin: 0px 14px 0 10px;
	background: aliceblue;
	transition: all 0.5s ease;
	padding: 10px;">
				</div>   
            </td>
            <td><?= $group['name'] ?></td>
            <td></td>
            <td>
                
                <a href="?p=groupUpdate&id=<?= $group['id'] ?>" class="btn btn-success">
                <i class="bi bi-pencil-square"></i>
                </a>  
                <a href="./controllers/groupController.php?action=delete&id=<?= $group['id'] ?>" class="btn btn-danger">
                <i class="bi bi-trash"></i>
                </a>
            
            </td>
            </tr>

            <?php

        }
    } else {
        echo "Aucun group trouvé.";
    }
    ?>
      
            
        
        </tbody>
      </table>
    </div>
</div>