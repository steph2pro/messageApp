
<div class="container">
        <div class="leftSide">
            <div class="header">
            <div class="imgText" style="width: 70%;">
                    <div class="userimg">
                    <img src="./assets/profiles/<?= $_SESSION['user']["profil"] ?>" class="cover" alt="">
                    </div>
                    <h6><?= $_SESSION['user']["username"] ?><br><span style="font-size: 0.7em;">en ligne</span></h6>
                </div>
                <ul class="nav_icons">
                    <a href="?p=log-out"  style="text-decoration: none;">
                        <li><ion-icon name="log-out-outline"></ion-icon></li>
                    </a>
                    <a href="?p=listNews"  style="text-decoration: none;">
                        <li><ion-icon name="scan-circle-outline"></ion-icon></li>
                    </a>
                    <a href="?p=myGroup"  style="text-decoration: none;">
                    <li><ion-icon name="logo-wechat"></ion-icon></li>
                    </a>
                    <a href="?p=groupAdd"  style="text-decoration: none;">
                        <li><ion-icon name="add-sharp"></ion-icon></li>
                    </a>
                    
                </ul>
            </div>
            <!-- recherche -->
            <div class="chearch_chat">
                <div>
                    <input type="text" name="recherche" placeholder="rechercher un groupe" id="">
                    <ion-icon name="search-outline"></ion-icon>
                </div>
            </div>
            <!-- liste des groupes -->
            <div class="chatlist">
                <?php 
                if (isset($_GET['p'])) {
                    $route=$_GET['p'];
                    if ($route == "listNews" || $route == "contentnews") {
                        require_once 'newsList.php'; 
                    }elseif($route == "myGroup" || $route == "contentGroup"){
                        require_once 'myGroups.php'; 
                    }

            }else{
                require_once 'myGroups.php'; 
            }
                        
                 ?>
            </div>
        </div>
        <!-- messagerie -->
        <div class="rightSide" >
            <?php
                if (isset($_GET['p'])) {
                    $route=$_GET['p'];
                    if ($route == "contentGroup") {
                        require_once 'contentGroup.php';
                    } elseif($route == "listNews"){
                        require_once 'acceuil.php';
                    }elseif($route == "contentnews"){
                        require_once 'contentnews.php';
                    }elseif($route == "restore"){
                        require_once 'restore.php';
                    }
                    else {
                       // var_dump($_se)
                        echo '<img src="./assets/images/fontGroup.jpg" style="width: 100%;height:100%;position:absolute" alt="">';
                        
                    }
                    
                }
            ?>
            
        </div>
    </div>
    
    <?php
                $route = '';
                if (isset($_GET['p'])) {
                    $route=$_GET['p'];
                }
            
                switch ($route) {
                    
                    case 'log-out':
                        require_once 'controllers/deconnection.php';
                        break;
                    case 'addNews':
                        require_once 'views/newsAdd.php';
                        break;
                    case 'list':
                            require_once 'views/newsList.php';
                            break;
                    
                    //  case 'chargement':
                    //             require_once 'views/chargement.php';
                    //             break;
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
                        require_once 'groupAdd.php';
                        break;
					 case 'addUserGroup':
                        require_once 'addUserGroup.php';
                        break;
                    case 'listUserGroup':
                            require_once 'listUserGroup.php';
                            break;
                    
                               
                     
                    
                    
                }
            ?>
