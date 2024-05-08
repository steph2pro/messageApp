<?php
session_start();
// Inclure les fichiers des classes
require_once '../models/Database.php';
require_once '../models/NewsManager.php';
require_once '../models/News.php';

// Vérifier l'action passée dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Instancier la classe Database
    $database = new Database();
    $connection = $database->getConnection();

    // Instancier la classe NewsManager avec la connexion à la base de données
    $newsManager = new NewsManager($connection);

    // Effectuer les opérations CRUD en fonction de l'action
    switch ($action) {
        case 'create':
            // Vérifier si les données du formulaire sont soumises
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $auteur = $_POST['auteur'];
                $titre = $_POST['titre'];
                $contenu = $_POST['contenu'];
                $dateAjout = date('Y-m-d H:i:s');
                $dateModif = date('Y-m-d H:i:s');

                // Créer une nouvelle instance de la classe News
                $news = new News($auteur, $titre, $contenu, $dateAjout, $dateModif);

                // Appeler la méthode create du NewsManager pour ajouter la news dans la base de données
                $newsId = $newsManager->create($news);
                $_SESSION["msg"]='la nouvele de '.$auteur.' ajouter avec sucess';
                
                // Rediriger vers la page de détails de la news créée
                header("Location: ../index.php?p=listNews");
                //exit;
            }
            break;


        case 'update':
            // Vérifier si les données du formulaire sont soumises
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $newsId = $_GET['id'];
                $auteur = $_POST['auteur'];
                $titre = $_POST['titre'];
                $contenu = $_POST['contenu'];
                $dateModif = date('Y-m-d H:i:s');

                // Récupérer les détails de la news à mettre à jour
                $newsDetails = $newsManager->read($newsId);

                // Vérifier si la news existe
                if ($newsDetails) {
                    // Mettre à jour les propriétés de la news
                    $newsDetails['auteur'] = $auteur;
                    $newsDetails['titre'] = $titre;
                    $newsDetails['contenu'] = $contenu;
                    $newsDetails['dateModif'] = $dateModif;

                    // Créer une nouvelle instance de la classe News avec les nouvelles valeurs
                    $news = new News($newsDetails['auteur'], $newsDetails['titre'], $newsDetails['contenu'], $newsDetails['dateAjout'], $newsDetails['dateModif']);
                    $news->setId($newsId);

                    // Appeler la méthode update du NewsManager pour mettre à jour la news dans la base de données
                    $newsManager->update($news);

                    $_SESSION["msg"]='la nouvele de '.$auteur.' a ete modifier avec sucess';
                    
                    // Rediriger vers la page de détails de la news modifier
                    header("Location: ../index.php?p=list");
                }
            }
            break;

        case 'delete':
            // Vérifier si l'ID de la news est passé dans l'URL
            if (isset($_GET['id'])) {
                $newsId = $_GET['id'];

                // Appeler la méthode delete du NewsManager pour supprimer la news de la base de données
                $newsManager->delete($newsId);

                $_SESSION["msg"]='la nouvele a ete suprimer avec sucess';
                    
                // Rediriger vers la page de détails de la news modifier
                header("Location: ../index.php?p=list");
            }
            break;

        default:
            // Rediriger vers une page d'erreur ou une autre page appropriée
            header("Location: error.php");
            exit;
    }
} else {
    // Rediriger vers une page d'erreur ou une autre page appropriée
    header("Location: error.php");
    exit;
}