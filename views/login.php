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
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/styles/admin.css" />
</head>
<body>


<section>
	
<form class="box" action="./controllers/connexionController.php" style="width: 50%;" method="post" name="login">
<h1 class="box-logo box-title"><a href=""> Message App</a></h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="mail" class="box-input" name="email" placeholder="votre email">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="compte" style="display: flex;">
	si vous n'avez pas de compte
	<a href="?p=compte" style="margin-left: 10px;margin-top: -5px">
	creer un compte
	</a>
</p>
 <?php
                     
        if (isset($_GET['error'])) {
            $err=htmlspecialchars($_GET['error']);
            switch ($err) {
                    case 'vide':
                    ?>
                    <div class="alert-succes">
                        <strong>Erreur: </strong>
                        <script type="text/javascript">
                            alert("Veuillez remplir tous les champ !");
                        </script>
                        <i> Veuillez remplir tous les champ !</i>
                    </div>
                    <?php
                    break;

                    case 'nontrouver':
                    ?>
                    <div class="alert-danger">
                        <strong>Erreur: </strong>
                        <script type="text/javascript">
                            alert(" ce Compte n'existe pas !!");
                        </script>
                        <i> Compte inexistant !</i>
                    </div>
                    <?php
                    break;
            }

        }
    ?>

</form>


</section>
</body>
</html>