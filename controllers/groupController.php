<?php
session_start();
// Inclure les fichiers des classes
require_once './services.php';
// Vérifier l'action passée dans l'URL
$createur=$_SESSION["user"]["id"];
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
                //$profil = $_POST['profil'];
                
                $date = date("Y-m-d H:i:s"); 
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
                            $groupId = $groupBD->createGroup($nom,$profil, $utilisateurs,$date,$createur);
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


        case 'addUuserGroup':
            // Vérifier si les données du formulaire sont soumises
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $groupId = $_GET['id'];
                $utilisateurs = $_POST['utilisateurs'];
                $date = date("Y-m-d H:i:s"); 
                $groupBD->addUserToGroup($groupId, $utilisateurs,$date);
                    $_SESSION["msg"]='les utilisateur ont ete ajouter au groupe avec sucess';
                    
                    // Rediriger vers la page de détails de la news modifier
                    header("Location: ../index.php");
                
            }
            break;

        case 'delete':
            // Vérifier si l'ID de la news est passé dans l'URL
            if (isset($_GET['id'])) {
                $userId = $_GET['id'];
                $groupId = $_GET['idGroup'];
                $res=$groupBD->removeUserFromGroup($userId, $groupId); 
                 var_dump($res);
                 $_SESSION["msg"]=$res;
                
                // Rediriger vers la page de détails de la news modifier
                header("Location: ../index.php");
            }
            break;

    }
} 