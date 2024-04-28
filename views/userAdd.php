
<div class="container-fluid">
 
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center">
 
      <h1>Ajouter un utilisateur!</h1>
      <form method="post" action="./controllers/userController.php?action=create"  enctype="multipart/form-data">
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">nom d'utilisateur</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" name="nom">
        </div>
    </div>


    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">email</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword3" name="email">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword4" class="col-sm-2 col-form-label">photo de profil</label>
        <div class="col-sm-10">
        <input type="file" class="form-control" id="inputPassword4" name="profil">
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary"> enregistrer</button>
    </form>
      
    </div>
  </div>
    

    </div>



