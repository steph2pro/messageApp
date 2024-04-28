
<div class="container-fluid">
 
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="text-center">
 
      <h1>Ajouter une News!</h1>
      <form method="post" action="./controllers/newsController.php?action=create">
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Auteur</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" name="auteur">
        </div>
    </div>


    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">titre</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword3" name="titre">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">contenue</label>
        <div class="col-sm-10">
        <textarea type="text" class="form-control" id="inputPassword3" name="contenu">
        </textarea>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary"> enregistrer</button>
    </form>
      
    </div>
  </div>
    

    </div>



