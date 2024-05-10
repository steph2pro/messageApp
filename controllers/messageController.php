<?php
// Inclure les fichiers des classes
require_once 'C:\xampp\htdocs\messageApp\controllers\services.php';

// Vérifier si les données du formulaire sont soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['content']) && !empty($_POST['content'])) {
        // Récupérer les données du formulaire
        $recipient = $_GET['id'];
        $sender = $_SESSION["user"]['id'];
        $content = $_POST['content'];
        $time = date('Y-m-d H:i:s');

        // Créer une nouvelle instance de la classe News
        $messageDB->sendMessage($content, $sender, $recipient, $time);
        // header("Location: ../index.php?p=contentGroup&id=1" . $_GET['id']);
    }
}
