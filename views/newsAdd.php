
<section style="position:absolute; width:100%" class="section">
	
<form class="box" style="width: 30%;" action="./controllers/newsController.php?action=create""  enctype="multipart/form-data" method="post" name="login">
	<h1 class="box-logo box-title"> message App<a href="./index.php" style="margin-left: 100px;position:absolute"><ion-icon name="close-sharp"></ion-icon></a></h1>
	<h1 class="box-title">Ajouter une News!</h1>
 
<input type="text" class="box-input" name="auteur" placeholder="Nom de l'auteue" required>
<input type="text" class="box-input" name="titre" placeholder="Titre de la news" required>
<textarea type="text" class="box-input" id="contenue" name="contenu">
  entrez le contenue de la nouvelle
        </textarea>



<input type="submit" value="enregistrer " name="submit" class="box-button" required>


</form>


</section>


