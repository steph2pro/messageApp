
<div class="container">
        <div class="leftSide">
            <div class="header">
            <div class="imgText">
                    <div class="userimg">
                    <img src="./assets/profiles/<?= $_SESSION['user']["profil"] ?>" class="cover" alt="">
                    </div>
                    <h4><?= $_SESSION['user']["username"] ?><br><span>en ligne</span></h4>
                </div>
                <ul class="nav_icons">
                    <li><ion-icon name="scan-circle-outline"></ion-icon></li>
                    <li><ion-icon name="logo-wechat"></ion-icon></li>
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
                <?php  require_once 'myGroups.php';  ?>
            </div>
        </div>
        <!-- messagerie -->
        <div class="rightSide" >
            <?php
                if (isset($_GET['p'])) {
                    $route=$_GET['p'];
                    if ($route == "contentGroup") {
                        require_once 'contentGroup.php';
                    } else {
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
                        require_once 'groupAdd.php';
                        break;
                    case 'groupList':
                            require_once 'views/groupList.php';
                            break;
                    
                               
                     
                    
                    
                }
            ?>
