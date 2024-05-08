<?php
session_start();
// Inclure les fichiers des classes
require_once './services.php';
// Vérifier l'action passée dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];


    // Effectuer les opérations CRUD en fonction de l'action
    switch ($action) {
        case 'send':
            // Vérifier si les données du formulaire sont soumises
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $idGroup = $_GET['id'];
                $content = $_POST['content'];
                $sender_id=$_SESSION['user']["id"];
                $messageId = $messageBD->createMessage($content, $sender_id, $idGroup);
                $_SESSION["msg"]="message envoyer avec succes";
                
                header("Location: ../index.php?p=contentGroup&id=".$idGroup);
            }
            break;

        case 'delete':
            // Vérifier si l'ID de la message est passé dans l'URL
            if (isset($_GET['id'])) {
                $messageId = $_GET['id'];

                // Appeler la méthode delete du messageManager pour supprimer la message de la base de données
                $messageBD->deleteMessage($messageId);

                $_SESSION["msg"]="l'utilisateur a ete suprimer avec sucess";
                    
                // Rediriger vers la page de détails de la message modifier
                header("Location: ../index.php?p=messageList");
            }
            break;

        
    }
} else {
    // Rediriger vers une page d'erreur ou une autre page appropriée
    echo 'aucune action passer';
    exit;
}