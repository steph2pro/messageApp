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
                $email = $_POST['email'];
                $online = false;
                if (isset($_FILES["profil"])){
                          
                    # recuperation des information sur limage
                    $img_name=$_FILES["profil"]["name"];
                    $img_size=$_FILES["profil"]["size"]/1024;//pour convertir la taille es Ko
                    $tmp_name=$_FILES["profil"]["tmp_name"];
                    if ($img_size>100000) {
                        //message d'erreur
                        $_SESSION["msg"]="desole,ce fichier est trop grand !";
                        
                        header('location:../index.php?p=userAdd');
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
                            // Appeler la méthode create  pour ajouter la user dans la base de données
                            $userId = $userBD->create($nom, $email, $profil, $online);
                            $_SESSION["msg"]="utilisateur enregistrer avec succes";
                            //connection
                            $user = $userBD->login($nom,$email);
                            if (!empty($user)) {
                                $_SESSION['user'] = $user;
                            header('location: ../index.php?p=chargement');
                                
                            }else{
                                header('location: ../views/login.php?error=nontrouver');
                            }
                        }else{
                            //message d'erreur a cause du type de fichier
                            $_SESSION["msg"]="desole,ce fichier n'est pas le type requis !";
                            
                            header('location:../index.php?p=userAdd');
                        }
                   }
                }else{
                    
                    $_SESSION["msg"]="veuillez choisir une photo avant d'enregistrer !";
                            
                    header('location:../index.php?p=userAdd');

                }

                

    
            }
            break;


        case 'update':
            // Vérifier si les données du formulaire sont soumises
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               // Récupérer les données du formulaire
               $userId = $_GET['id'];
               $nom = $_POST['nom'];
               $email = $_POST['email'];
               $online = false;
               if (isset($_FILES["profil"])){
                   # recuperation des information sur limage
                   $img_name=$_FILES["profil"]["name"];
                   $img_size=$_FILES["profil"]["size"]/1024;//pour convertir la taille es Ko
                   $tmp_name=$_FILES["profil"]["tmp_name"];
                   if ($img_size>100000) {
                       //message d'erreur
                       $_SESSION["msg"]="desole,ce fichier est trop grand !";
                       
                       header('location:../index.php?p=userAdd');
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


                                // Appeler la méthode update du userManager pour mettre à jour la user dans la base de données
                                $userBD->update($nom, $email, $profil, $online,$userId);
                               
                                $_SESSION["msg"]="l'utilisateur a ete modifier avec sucess";
                               
                                // Rediriger vers la page de détails de la user modifier
                                header("Location:../index.php?p=userList");
                            
                           
                       }else{
                           //message d'erreur a cause du type de fichier
                           $_SESSION["msg"]="desole,ce fichier n'est pas le type requis !";
                           
                           header('location:../index.php?p=userList');
                       }
                  }
               }else{
                   
                   $_SESSION["msg"]="veuillez choisir une photo avant d'enregistrer !";
                           
                   header('location:../index.php?p=userAdd');

               }

                
            }
            break;

        case 'delete':
            // Vérifier si l'ID de la user est passé dans l'URL
            if (isset($_GET['id'])) {
                $userId = $_GET['id'];

                // Appeler la méthode delete du userManager pour supprimer la user de la base de données
                $userBD->delete($userId);

                $_SESSION["msg"]="l'utilisateur a ete suprimer avec sucess";
                    
                // Rediriger vers la page de détails de la user modifier
                header("Location: ../index.php?p=userList");
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