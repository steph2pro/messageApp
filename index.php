<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MessageApp</title>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
	<link rel="stylesheet" type="text/css" href="assets/styles/menue.css">
	<!-- Boxicons CSS -->
<script type="text/javascript" src="assets/js/app.js" defer></script>
<?php
    
    session_start();
    if (isset($_SESSION["msg"])) {
        $message = $_SESSION["msg"];
        unset($_SESSION["msg"]);
		//echo $_SESSION["msg"];die;
        echo "<script>alert('$message');</script>";
    }
    
     $active = '';
    if (isset($_GET['p'])) {
         $active=$_GET['p'];
    }
?>
</head>
<body>
<div class="sidebar">
		<div class="logo_details">
			<i class='bx bxl-c-plus-plus'></i>
			<span class="logo_name">messageApp</span>
			
		</div>
		<ul class="nav-links">
			<li>
				<a href="?p=acc">
					<i class='bx bx-grid-alt' ></i>
					<span class="link_name">Acceuil</span>
				</a>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="?p=acc">Acceuil</a></li>
					
				</ul>
			</li>
			<li>
				<div class="icon-link">
					<a href="#">
						<i class='bx bx-collection'></i>
						<span class="link_name active">News</span>
					</a>
					<i class='bx bxs-chevron-down arrow'></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link_name active" href="#">News</a></li>
					<li><a href="?p=list">liste</a></li>
					<li><a href="?p=add">ajouter</a></li>
					<li><a href="#">plus</a></li>
				</ul>
			</li>
			<li>
				<div class="icon-link">
					<a href="#">
						<i class='bx bx-book-alt' ></i>
						<span class="link_name">Utilisateur</span>
					</a>
					<i class='bx bxs-chevron-down arrow'></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link_name" href="#">Utilisateur</a></li>
					<li><a href="?p=userList">liste</a></li>
					<li><a href="?p=userAdd">ajouter</a></li>
					<li><a href="#">plus</a></li>
			
				</ul>
			</li>
			<li>
				<div class="icon-link">
					<a href="#">
						<i class='bx bx-plug' ></i>
						<span class="link_name">Groupes</span>
					</a>
					<i class='bx bxs-chevron-down arrow'></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link_name" href="#">Groupes</a></li>
					<li><a href="?p=groupAdd">ajouter</a></li>
					<li><a href="?p=groupList">liste</a></li>
					<li><a href="#">plus</a></li>
			
				</ul>
			</li>
			
			<li>
				<a href="#">
					<i class='bx bx-cog' ></i>
					<span class="link_name">Parametre</span>
				</a>
				<ul class="sub-menu blank">
					<li><a class="link_name" href="#">Parametre</a></li>
					
				</ul>
			</li>
			<li>
		
				<div class="profile-details">
					<div class="profile-content">
						<img src="assets/images/profile.png" alt="profile">
					</div>
					
					<div class="name-job">
						<div class="profile-name">Stephane </div>
						<div class="job">Web desginer</div>
						
					</div>
					<i class='bx bx-log-out' ></i>
				
				</div>
			</li>
		</ul>
	</div>
	<section class="home-section">
		<div class="home-content">
			<i class="bx bx-menu">+</i>
			<span class="text">Bienvenue sur mon application de messagerie</span>
		</div>
	</section>
    <!-- <nav>
   
    <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?php if ($active == 'acc' ) { echo 'active'; }?>" aria-current="page" href="?p=acc">Acceuil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($active == 'add' ) { echo 'active'; }?>" href="?p=add">Ajouter une news</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if ($active == 'list' ) { echo 'active'; }?>" href="?p=list">Liste des news</a>
  </li>
  <li class="nav-item">
     <a class="nav-link disabled">Disabled</a> 
  </li>
</ul>
    </nav> -->

    <div>

    <?php
                $route = '';
                if (isset($_GET['p'])) {
                    $route=$_GET['p'];
                }
            
                switch ($route) {
                    
                    case 'acc':
                        require_once 'views/acceuil.php';
                        break;
                    case 'add':
                        require_once 'views/newsAdd.php';
                        break;
                    case 'list':
                            require_once 'views/newsList.php';
                            break;
                    
                     case 'update':
                                require_once 'views/newsUpdate.php';
                                break;
                     case 'view':
                        require_once 'views/newsView.php';
                        break;
					 case 'userAdd':
                        require_once 'views/userAdd.php';
                        break;
                    case 'userList':
                            require_once 'views/userList.php';
                            break;
                    
                     case 'userUpdate':
                                require_once 'views/userUpdate.php';
                                break;
					 case 'groupAdd':
                        require_once 'views/groupAdd.php';
                        break;
                    case 'groupList':
                            require_once 'views/groupList.php';
                            break;
                    
                     case 'groupUpdate':
                                require_once 'views/groupUpdate.php';
                                break;
                               
                     
                    
                    
                    default:
                        require_once 'views/acceuil.php';
                        break;
                }
            ?>

    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>