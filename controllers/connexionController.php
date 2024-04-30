<?php
    session_start();

    require_once './services.php';

    if (isset($_POST)) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        $user = $userBD->login($username,$email);
        // var_dump($user);
        // die;
        if (!empty($user)) {
            $_SESSION['user'] = $user;
        header('location: ../index.php?p=chargement');
             
        }else{
             header('location: ../views/login.php?error=nontrouver');
        }

    }else{
        header('location: ../views/login.php?error=vide');
    }
?>