
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center">
      <h1>liste des users!</h1>
      <?php
      // Inclure les fichiers des services
      require_once './services.php';
    // Appeler la méthode readAllusers pour afficher tous les users
    $listusers = $userBD->readAllUsers();
    // Vérifier si la liste des users n'est pas vide
    if (!empty($listusers)) {
        // Afficher les éléments dans un tableau
        ?>
            <table class="table table-striped">
        <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">nom</th>
                <th scope="col">email</th>
                <th scope="col">profile</th>
                <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
        <?php
        $count=0;
        foreach ($listusers as $user) {
            $count++;
            ?>
            <tr>
            <th scope="row"><?= $count ?></th>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td> 
                <div class="profile-content">
					<img src="assets/profiles/<?= $user['profil'] ?>" alt="profile" style="height: 52px;
	width: 52px;
	object-fit: cover;
	border-radius: 16px;
	margin: 0px 14px 0 10px;
	background: aliceblue;
	transition: all 0.5s ease;
	padding: 10px;">
				</div>   
            </td>
            <td>
                
                <a href="?p=userUpdate&id=<?= $user['id'] ?>" class="btn btn-success">
                <i class="bi bi-pencil-square"></i>
                </a>  
                <a href="./controllers/userController.php?action=delete&id=<?= $user['id'] ?>" class="btn btn-danger">
                <i class="bi bi-trash"></i>
                </a>
            
            </td>
            </tr>

            <?php

        }
    } else {
        echo "Aucun user trouvé.";
    }
    ?>
      
            
        
        </tbody>
      </table>
    </div>
</div>