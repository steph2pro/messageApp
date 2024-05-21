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
                $newsDetails = $newsManager->read($newsId);
                // Créer un objet SimpleXMLElement pour le fichier XML
                $xml = simplexml_load_file('../models/news_backup.xml');                 
                // Ajouter les données de la nouvelle dans le fichier XML
                $nouvelNews = $xml->addChild('news');
                $nouvelNews->addChild('id', $newsId);
                $nouvelNews->addChild('auteur', $newsDetails['auteur']); // Remplacez par l'auteur réel de la nouvelle
                $nouvelNews->addChild('titre', $newsDetails['titre']);
                $nouvelNews->addChild('Contenu', $newsDetails['contenu']);
                $nouvelNews->addChild('dateAjout',$newsDetails['dateAjout']);
                $nouvelNews->addChild('dateModif', $newsDetails['dateModif']);

                // Sauvegarder le fichier XML
                $xml->asXML('../models/news_backup.xml');
                // Appeler la méthode delete du NewsManager pour supprimer la news de la base de données
                $newsManager->delete($newsId);

                $_SESSION["msg"]='la nouvele a ete suprimer avec sucess';
                    
                // Rediriger vers la page de détails de la news modifier
                header("Location: ../index.php?p=listNews");
            }
            break;
            case 'restore':
                // Vérifier si l'ID de la news est passé dans l'URL
                if (isset($_GET['id'])) {
                    $newsId = $_GET['id'];
                    //$newsDetails = $newsManager->read($newsId);
                    // Créer un objet SimpleXMLElement pour le fichier XML
                    $xml = simplexml_load_file('../models/news_backup.xml'); 
                    // Rechercher la news avec l'id correspondant
                     $news = $xml->xpath("//news[id='$newsId']");
                    // Récupérer les informations du livre
                    $id = (string) $news[0]->id;
                    $titre = (string) $news[0]->titre;
                    $auteur = (string) $news[0]->auteur;
                    $contenu = (string) $news[0]->contenu;  
                    $dateAjout = (string) $news[0]->dateAjout;
                    $dateModif = (string) $news[0]->dateModif;  
                 
                // Créer une nouvelle instance de la classe News
                $news = new News($auteur, $titre, $contenu, $dateAjout, $dateModif);

                // Appeler la méthode create du NewsManager pour ajouter la news dans la base de données
                $newsId = $newsManager->create($news);
                $_SESSION["msg"]='la nouvele de '.$auteur.' restaurer avec sucess';
                // supression de l'element restaurer dans le fichier xml
                $xmlContent = file_get_contents('../models/news_backup.xml');
                // Charger le contenu XML en tant qu'objet SimpleXMLElement
                $xml = new SimpleXMLElement($xmlContent);

                // Rechercher l'élément <news> avec l'ID spécifié
                $newsId = $_GET['id']; // Remplacez par l'ID de la nouvelle que vous souhaitez supprimer
                $newsElement = $xml->xpath("//news[id='$newsId']")[0];
                // Supprimer l'élément <news> du fichier XML
                $dom = dom_import_simplexml($newsElement);
                $dom->parentNode->removeChild($dom);

                // Sauvegarder le contenu mis à jour dans le fichier XML
                file_put_contents('../models/news_backup.xml', $xml->asXML());

                // Rediriger vers la page de détails de la news créée
                header("Location: ../index.php?p=listNews");
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