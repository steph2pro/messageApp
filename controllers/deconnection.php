<?php
// Détruire la session actuelle
session_start();
session_destroy();

// Rediriger vers une page de déconnexion réussie ou une autre page de ton choix
header("Location: ./index.php?p=login");
exit();
?>