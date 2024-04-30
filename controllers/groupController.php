<?php
session_start();
// Inclure les fichiers des classes
require_once './services.php';
// Vérifier l'action passée dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];


    // Effectuer les opérations CRUD en fonction de l'action
    switch ($action) {
        case 'create':
            // Vérifier si les données du formulaire sont soumises
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $nom = $_POST['nom'];
                $utilisateurs = $_POST['utilisateurs'];
                $profil = $_POST['profil'];
                
                if (isset($_FILES["profil"])){
                          
                    # recuperation des information sur limage
                    $img_name=$_FILES["profil"]["name"];
                    $img_size=$_FILES["profil"]["size"]/1024;//pour convertir la taille es Ko
                    $tmp_name=$_FILES["profil"]["tmp_name"];
                    if ($img_size>100000) {
                        //message d'erreur
                        $_SESSION["msg"]="desole,ce fichier est trop grand !";
                        
                        header('location:../index.php?p=groupAdd');
                   }else{
                        //recuperation de l'extension du fichier
                        $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                        //convertion de cet extension en miniscule
                        $img_ex_min=strtolower($img_ex);
                        //creation d'un tableau pour stocker les extenssion acceptable
                        $allowed_exs=array("jpg","jpeg","png");
                        //test si l'extension de l'image est parmi de ceux acceptable
                        if (in_array($img_ex_min,$allowed_exs)) {
                            //on renome l'image en le donant un nom aleatoir
                            $profil=uniqid("PROFILE-",true).'.'.$img_ex_min;
                            //creation du repertoire pour les image
                            $img_upload_path="../assets/profiles/".$profil;
                            //on deplace l'image vers le dossier profiles
                            move_uploaded_file($tmp_name,$img_upload_path);
                            //enregistrement dans la bd       
                            // Appeler la méthode create  pour ajouter le group dans la base de données
                            $groupId = $groupBD->createGroup($nom,$profil, $utilisateurs);
                            $_SESSION["msg"]="group ".$nom." creer avec succes";
                            // Rediriger vers la page de détails de la news créée
                            header("Location: ../index.php");
                        }else{
                            //message d'erreur a cause du type de fichier
                            $_SESSION["msg"]="desole,ce fichier n'est pas le type requis !";
                            
                            header('location:../index.php?p=groupAdd');
                        }
                   }
                }else{
                    
                    $_SESSION["msg"]="veuillez choisir une photo avant d'enregistrer !";
                            
                    header('location:../index.php?p=groupAdd');

                }
                //  foreach($utilisateurs as $utilisateur) {
                //     echo $utilisateur; // Par exemple, afficher les utilisateurs sélectionnés
                // }
                // die;
                
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