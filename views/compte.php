<?php 
//session_start(); 
 
 ?>

 <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/styles/admin.css" />
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" defer></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js" defer></script>
</head>
<body>
<?php

  if (isset($_SESSION['error'])) {
    // code...
    $error=$_SESSION['error'];
    echo '<script type="text/javascript">';
    echo 'alert("'.$error['message'].'")';
    echo "</script>";
    //fermeture de la session
    unset($_SESSION['error']);
  } 
?>


<section>
	
<form class="box" action="./controllers/userController.php?action=create" style="width: 36%;"  enctype="multipart/form-data" method="post" name="login">
	<h1 class="box-logo box-title"><a href=""> message App</a></h1>
	<h1 class="box-title">creer votre compte</h1>
<input type="text" class="box-input" name="nom" placeholder="votre nom Complet" required>
<input type="mail" class="box-input" name="email" placeholder="votre email" required>
<input type="file" class="box-input" id="inputPassword4" name="profil">
<input type="submit" value="enregistrer " name="submit" class="box-button" required>
<p class="compte" style="display: flex;">
	si vous avez deja un compte
	<a href="?p=login" style="margin-left: 10px;margin-top: -5px">
	connectez vous
	</a>
</p>

</form>


</section>
</body>
</html>